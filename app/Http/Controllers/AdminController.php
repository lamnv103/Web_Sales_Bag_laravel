<?php

namespace App\Http\Controllers;

use App\Mail\ContactResponse;
use App\Models\Brand;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Models\Category;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction; 
use App\Models\User;
use App\Models\Slide;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResponseMail;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy("created_at","DESC")->get()->take(10);
        $users = User::orderBy('name', 'ASC')
                    ->orderBy('image', 'DESC')
                    ->paginate(12);
        $categories = Category::withCount('products')->get();
        $brands = Brand::withCount('products')->get();
        $dashboardDatas = DB::select("
        SELECT 
            SUM(total) AS TotalAmount,
            SUM(IF(status='pending', total, 0)) AS TotalOrderedAmount,
            SUM(IF(status='delivered', total, 0)) AS TotalDeliveredAmount,
            SUM(IF(status='canceled', total, 0)) AS TotalCanceledAmount,
            COUNT(*) AS Total,
            SUM(IF(status='pending', 1, 0)) AS TotalOrdered,
            SUM(IF(status='delivered', 1, 0)) AS TotalDelivered,
            SUM(IF(status='canceled', 1, 0)) AS TotalCanceled
            FROM orders
            ");

        $monthlyDatas = DB::select("
            SELECT 
                M.id AS MonthNo, 
                M.name AS MonthName, 
                IFNULL(D.TotalAmount, 0) AS TotalAmount,
                IFNULL(D.TotalOrderedAmount, 0) AS TotalOrderedAmount,
                IFNULL(D.TotalDeliveredAmount, 0) AS TotalDeliveredAmount,
                IFNULL(D.TotalCanceledAmount, 0) AS TotalCanceledAmount
            FROM 
                month_names M
            LEFT JOIN (
                SELECT 
                    MONTH(created_at) AS MonthNo,
                    DATE_FORMAT(created_at, '%b') AS MonthName,
                    SUM(total) AS TotalAmount,
                    SUM(IF(status = 'pending', total, 0)) AS TotalOrderedAmount,
                    SUM(IF(status = 'delivered', total, 0)) AS TotalDeliveredAmount,
                    SUM(IF(status = 'canceled', total, 0)) AS TotalCanceledAmount
                FROM 
                    Orders
                WHERE 
                    YEAR(created_at) = YEAR(NOW())
                GROUP BY 
                    YEAR(created_at), 
                    MONTH(created_at), 
                    DATE_FORMAT(created_at, '%b')
            ) D 
            ON D.MonthNo = M.id
            ");

        // Extracting monthly data into separate variables
        $AmountM = implode(',', collect($monthlyDatas)->pluck('TotalAmount')->toArray());
        $OrderedAmountM = implode(',', collect($monthlyDatas)->pluck('TotalOrderedAmount')->toArray());
        $DeliveredAmountM = implode(',', collect($monthlyDatas)->pluck('TotalDeliveredAmount')->toArray());
        $CanceledAmountM = implode(',', collect($monthlyDatas)->pluck('TotalCanceledAmount')->toArray());

        // Calculating totals
        $TotalAmount = collect($monthlyDatas)->sum('TotalAmount');
        $TotalOrderedAmount = collect($monthlyDatas)->sum('TotalOrderedAmount');
        $TotalDeliveredAmount = collect($monthlyDatas)->sum('TotalDeliveredAmount');
        $TotalCanceledAmount = collect($monthlyDatas)->sum('TotalCanceledAmount');


        return view('admin.index', compact('categories', 'brands', 'orders','users','dashboardDatas','AmountM','OrderedAmountM','DeliveredAmountM','CanceledAmountM','TotalAmount','TotalOrderedAmount','TotalDeliveredAmount','TotalCanceledAmount'));
    }

    public function brands()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        $users = User::orderBy('name', 'ASC')
                    ->orderBy('image', 'DESC')
                    ->paginate(12);
        return view('admin.brands' ,compact('brands', 'users'));
    }
    public function add_brand()
    {
        $users = User::orderBy('name', 'ASC')
            ->orderBy('image', 'DESC')
            ->paginate(12);
        return view('admin.brand-add', compact('users'));
    }
    
    public function brand_store(Request $request)
    {
     $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:brands,slug',
        'image' => 'mimes:png,jpg,jpeg|max:2048'
     ]); 

     $brand = new Brand();
     $brand->name = $request->name;
     $brand->slug = Str::slug($request->name);
     $image = $request->file('image');
     $file_extention = $request->file('image')->extension();
     $file_name = Carbon::now()->timestamp.'.'.$file_extention;
     $this->GenerateBrandThumbailsImage($image,$file_name);
     $brand->image = $file_name;
     $brand->save();
     return redirect()->route('admin.brands')->with('status','Thương hiệu đã được thêm vào một cách nhanh chóng!');

    }

    public function brand_edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand-edit',compact('brand'));
    }

    public function brand_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $request->id,
            'image' => 'mimes:png,jpg,jpeg|max:2048'
         ]); 
         $brand = Brand::find($request->id);

         if (!$brand) {
             return redirect()->back()->with('error', 'Không tìm thấy thương hiệu.');
         }
         $brand->name = $request->name;
         $brand->slug = Str::slug($request->name);
         if($request->hasFile('image')){
            if(File::exists(public_path('uploads/brands').'/'.$brand->image))
            {
                File::delete(public_path('uploads/brands').'/'.$brand->image);
            }
            $image = $request->file('image');
            $file_extention = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp.'.'.$file_extention;
            $this->GenerateBrandThumbailsImage($image,$file_name);
            $brand->image = $file_name;
         }

         $brand->save();
         return redirect()->route('admin.brands')->with('status','Thương hiệu đã được cập nhật một cách nhanh chóng!');
    }

    public function GenerateBrandThumbailsImage($image, $imageName)
    {
        $destinationPath = public_path('uploads/brands');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124, function($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
    }

    public function brand_delete($id)
    {
        $brand = Brand::find($id);
        if(File::exists(public_path('uploads/brands').'/'.$brand->image))
        {
            File::delete(public_path('uploads/brands').'/'.$brand->image);
        }
        $brand->delete();
        return redirect()->route('admin.brands')->with('status','Thương hiệu đã được xóa thành công!');
    }
    public function show_brand($id)
    {
        // Lấy thông tin brand dựa trên id
        $brand = Brand::findOrFail($id);

        // Truyền dữ liệu brand sang view
        return view('admin.brands', compact('brand'));
}


    public function categories()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);  
        $users = User::orderBy('name', 'ASC')
        ->orderBy('image', 'DESC')
        ->paginate(12);
        return view('admin.categories',compact('categories','users'));
    }
 
    public function category_add()
    {
        $users = User::orderBy('name', 'ASC')
        ->orderBy('image', 'DESC')
        ->paginate(12);
        return view('admin.category-add' , compact('users'));
    }

    public function category_store( Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
         ]); 
    
         $category = new Category();
         $category->name = $request->name;
         $category->slug = Str::slug($request->name);
         $image = $request->file('image');
         $file_extention = $request->file('image')->extension();
         $file_name = Carbon::now()->timestamp.'.'.$file_extention;
         $this->GenerateCategoryThumbailsImage($image,$file_name);
         $category->image = $file_name;
         $category->save();
         return redirect()->route('admin.categories')->with('status','Danh mục đã được thêm vào một cách thành công!');
    }
    public function GenerateCategoryThumbailsImage($image, $imageName)
    {
        $destinationPath = public_path('uploads/categories');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124, function($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
    }

    public function category_edit($id)
    {
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
    }

    public function category_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
         ]); 

        $category = Category::find($request->id);

        if (!$category) {
             return redirect()->back()->with('error', 'Không tìm thấy thương hiệu.');
         }
         $category->name = $request->name;
         $category->slug = Str::slug($request->name);
         if($request->hasFile('image')){
            if(File::exists(public_path('uploads/categories').'/'.$category->image))
            {
                File::delete(public_path('uploads/categories').'/'.$category->image);
            }
            $image = $request->file('image');
            $file_extention = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp.'.'.$file_extention;
            $this->GeneratecategoryThumbailsImage($image,$file_name);
            $category->image = $file_name;
        }
    $category->save();
    return redirect()->route('admin.categories')->with('status','Danh mục đã được cập nhật thành công!');
    }
    public function category_delete($id)
    {
        $category = Category::find($id);
        if(File::exists(public_path('uploads/categories').'/'.$category->image))
        {
            File::delete(public_path('uploads/categories').'/'.$category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('status','Thể loại đã bị xóa một cách nhanh chóng!');
    }
    // app/Http/Controllers/CategoryController.php
    public function show_category($id)
    {
        // Lấy thông tin category dựa trên id
        $category = Category::findOrFail($id);

        // Truyền dữ liệu category sang view
        return view('admin.categories', compact('category'));
    }

    public function products()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(10);
        $users = User::orderBy('name', 'ASC')
        ->orderBy('image', 'DESC')
        ->paginate(12);
        return view('admin.products', compact('products', 'users'));
    }

    public function product_add()
    {
        $categories = Category::select('id','name')->orderBy('name')->get();
        $brands = Brand::select('id','name')->orderBy('name')->get();   
        $users = User::orderBy('name', 'ASC')
                        ->orderBy('image', 'DESC')
                        ->paginate(12);
        return view('admin.product_add', compact('categories','brands' , 'users'));
    }

    public function product_store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:products,slug|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'required', // Sale price must be less than regular price
            'SKU' => 'required|string|unique:products,SKU|max:255',
            'stock_status' => 'required|in:in_stock,out_of_stock', // Validate stock status
            'featured' => 'required|boolean',
            'quantity' => 'required|integer|min:0',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048', // Validate main image format
            'category_id' => 'required|exists:categories,id', // Ensure category exists
            'brand_id' => 'required|exists:brands,id',       // Ensure brand exists
        ]);
        
        // Create a new product
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        
        // Validate sale price logic
        if ($request->sale_price && $request->sale_price < $request->regular_price) {
            $product->sale_price = $request->sale_price;
        } else {
            $product->sale_price = null; // No discount
        }
        
        $product->SKU = $request->SKU;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        
        $current_timestamp = Carbon::now()->timestamp;
        
        // **Process main image**
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if (!$image->isValid()) {
                return redirect()->back()->withErrors(['image' => 'Ảnh không hợp lệ.']);
            }
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenerateProductThumbnailImage($image, $imageName);
            $product->image = $imageName;
        }
        
        // **Process gallery images**
        $gallery_arr = [];
        if ($request->hasFile('images')) {
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $files = $request->file('images');
        
            foreach ($files as $index => $file) {
                if ($file->isValid()) {
                    $gextension = $file->getClientOriginalExtension();
                    if (in_array($gextension, $allowedExtensions)) {
                        $gfileName = $current_timestamp . "-" . ($index + 1) . "." . $gextension;
                        $this->GenerateProductThumbnailImage($file, $gfileName);
                        $gallery_arr[] = $gfileName;
                    }
                }
            }
            $product->images = implode(',', $gallery_arr);
        }
        
        $product->save();
    
        // Cập nhật số lượng sản phẩm trong danh mục và thương hiệu
        $this->updateCategoryProductCount($product->category_id);
        $this->updateBrandProductCount($product->brand_id);
        
        return redirect()->route("admin.products")->with("status", "Sản phẩm đã được thêm thành công!");
    }
    
    

    public function GenerateProductThumbnailImage($image, $imageName)
    {
        $destinationPathThumbnail = public_path('uploads/products/thumbnails');
        $destinationPath = public_path('uploads/products');
        $img = Image::read($image->path());

        $img->cover(540,689,"top");
        $img->resize(540,689, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        $img->resize(104,104, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);

    }

    public function product_edit($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id','name')->orderBy('name')->get();
        $brands = Brand::select('id','name')->orderBy('name')->get();
        return view('admin.product-edit', compact('product','categories', 'brands'));
    }
    public function product_update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:products,slug,' . $request->id . '|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'required',
            'SKU' => 'required|string|unique:products,SKU,' . $request->id . '|max:255',
            'stock_status' => 'required|in:in_stock,out_of_stock',
            'featured' => 'required|boolean',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);     

        $product = Product::find($request->id);
        $oldCategoryId = $product->category_id;
        $oldBrandId = $product->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
            // Kiểm tra nếu sale_price bằng regular_price, bỏ qua sale_price
        if ($request->sale_price && $request->sale_price < $request->regular_price) {
            $product->sale_price = $request->sale_price;
        } else {
            $product->sale_price = null; // Nếu không có giảm giá, bỏ trống
        }
        $product->SKU = $request->SKU;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        $current_timestamp = Carbon::now()->timestamp;      
        
        if ($request->hasFile('image')) 
        {
            if(File::exists(public_path('uploads/products').'/'.$product->image))
            {
               File::delete(public_path('uploads/products').'/'.$product->image); 
            }
            if(File::exists(public_path('uploads/products/thumbnails').'/'.$product->image))
            {
               File::delete(public_path('uploads/products/thumbnails').'/'.$product->image); 
            }
            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenerateProductThumbnailImage($image, $imageName);
            $product->image = $imageName;

        }

        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;

        if( $request->hasFile("images"))
        {
            foreach(explode(',',$product->images) as $ofile)
            {
                if(File::exists(public_path('uploads/products').'/'.$ofile))
                {
                   File::delete(public_path('uploads/products').'/'.$ofile); 
                }
                if(File::exists(public_path('uploads/products/thumbnails').'/'.$ofile))
                {
                   File::delete(public_path('uploads/products/thumbnails').'/'.$ofile); 
                }
            }
            $allowfileExtion = ['jpg','png','jpeg'];
            $files = $request->file('images');
            foreach($files as $file)    
            {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension,$allowfileExtion);
                if($gcheck)
                {
                    $gfileName = $current_timestamp . "-" . $counter . "." . $gextension;
                    $this->GenerateProductThumbnailImage($file, $gfileName);
                    array_push($gallery_arr, $gfileName);
                    $counter = $counter + 1;
                }

            }
            $gallery_images = implode(',',$gallery_arr);
            $product->images = $gallery_images;
        }
        $product->save();

        // Nếu danh mục thay đổi, cập nhật số lượng sản phẩm
        if ($oldCategoryId != $product->category_id) {
            $this->updateCategoryProductCount($oldCategoryId);
            $this->updateCategoryProductCount($product->category_id);
        }

        // Nếu thương hiệu thay đổi, cập nhật số lượng sản phẩm
        if ($oldBrandId != $product->brand_id) {
            $this->updateBrandProductCount($oldBrandId);
            $this->updateBrandProductCount($product->brand_id);
        }

        return redirect()->route('admin.products')->with('status','Sản phẩm đã được cập nhật thành công!');
    }
    
    public function product_delete($id)
    {
        $product = Product::find($id);
        if(File::exists(public_path('uploads/products').'/'.$product->image))
        {
           File::delete(public_path('uploads/products').'/'.$product->image); 
        }
        if(File::exists(public_path('uploads/products/thumbnails').'/'.$product->image))
        {
           File::delete(public_path('uploads/products/thumbnails').'/'.$product->image); 
        }

        foreach(explode(',',$product->images) as $ofile)
        {
            if(File::exists(public_path('uploads/products').'/'.$ofile))
            {
               File::delete(public_path('uploads/products').'/'.$ofile); 
            }
            if(File::exists(public_path('uploads/products/thumbnails').'/'.$ofile))
            {
               File::delete(public_path('uploads/products/thumbnails').'/'.$ofile); 
            }
        }
                // Lưu lại thông tin cũ về category_id và brand_id để cập nhật lại số lượng sau khi xóa
        $oldCategoryId = $product->category_id;
        $oldBrandId = $product->brand_id;

        $product->delete();

            // Cập nhật lại số lượng sản phẩm trong category và brand
        $this->updateCategoryProductCount($oldCategoryId);
        $this->updateBrandProductCount($oldBrandId);

        return redirect()->route('admin.products')->with('status','Sản phẩm đã được xóa thành công!');
    }

    public function updateCategoryProductCount($categoryId)
    {
        $category = Category::find($categoryId);
        if ($category) {
            // Đếm số lượng sản phẩm và lưu lại
            $category->product_count = $category->products()->count();
            $category->save();
    
            // Chuyển hướng về trang danh sách danh mục sau khi cập nhật
            return redirect()->route('admin.categories')->with('success', 'Số lượng sản phẩm đã được cập nhật!');
        }
        return redirect()->route('admin.categories')->with('error', 'Không tìm thấy danh mục!');
    }
    
    public function updateBrandProductCount($brandId)
    {
        $brand = Brand::find($brandId);
        if ($brand) {
            // Đếm số lượng sản phẩm và lưu lại
            $brand->product_count = $brand->products()->count();
            $brand->save();
    
            // Chuyển hướng về trang danh sách thương hiệu sau khi cập nhật
            return redirect()->route('admin.brands')->with('success', 'Số lượng sản phẩm đã được cập nhật!');
        }
        return redirect()->route('admin.brands')->with('error', 'Không tìm thấy thương hiệu!');
    }
    


    public function coupons()
    {
        $coupons = Coupon::orderBy('expiry_date','DESC')->paginate(12);
        $users = User::orderBy('name', 'ASC')
        ->orderBy('image', 'DESC')
        ->paginate(12);
        return view('admin.coupons', compact('coupons', 'users'));
    }

    public function coupon_add()
    {
        return view('admin.coupon-add');
    }
    
    public function coupon_store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);
        
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();
        
        return redirect()->route('admin.coupons')->with('status', 'Đã thêm phiếu giảm giá thành công!');
    }

    public function coupon_edit($id)    
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon-edit', compact('coupon'));
    }

    public function coupon_update(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);
        $coupon = Coupon::find($request->id);
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();
        
        return redirect()->route('admin.coupons')->with('status', 'Mã giảm giá đã được cập nhật thành công!');

    }
    
    public function coupon_delete($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect()->route('admin.coupons')->with('status', 'Mã giảm giá đã được xóa thành công!');


    }

    public function orders()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(12);
        $users = User::orderBy('name', 'ASC')
        ->orderBy('image', 'DESC')
        ->paginate(12);
        return view('admin.orders', compact('orders', 'users'));
     
    }

    public function order_details($order_id)
    {
        $order = Order::find($order_id);
        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(12);
        $transaction = Transaction::where('order_id', $order_id)->first();
        return view('admin.order-details', compact('order','orderItems','transaction'));
    }


    public function update_order_status(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'order_status' => 'required|in:pending,confirmed,shipping,delivered,canceled',
        ]);

        // Tìm đơn hàng theo ID
        $order = Order::find($request->order_id);

        // Cập nhật trạng thái đơn hàng
        $order->status = $request->order_status;

        // Xử lý các trạng thái đặc biệt
        if ($request->order_status == 'delivered') {
            $order->delivered_date = Carbon::now();
        } elseif ($request->order_status == 'canceled') {
            $order->canceled_date = Carbon::now();
        } else {
            $order->delivered_date = null;
            $order->canceled_date = null;
        }

        // Lưu thay đổi vào cơ sở dữ liệu
        $order->save();

        // Cập nhật trạng thái giao dịch tương ứng
        $this->update_transaction_status($order);

        // Trả về thông báo thành công
        return back()->with('status', 'Trạng thái đơn hàng đã được cập nhật thành công!');
    }

    /**
     * Hàm xử lý cập nhật trạng thái giao dịch
     */
    private function update_transaction_status(Order $order)
    {
        $transaction = Transaction::where('order_id', $order->id)->first();

        if ($transaction) {
            // Cập nhật trạng thái giao dịch dựa trên trạng thái đơn hàng
            if ($order->status == 'delivered') {
                $transaction->status = 'approved';
            } elseif ($order->status == 'canceled') {
                $transaction->status = 'canceled';
            } else {
                $transaction->status = 'pending';
            }
            $transaction->save();
        }
    }

    public function slides()
    {
        $slides = Slide::orderBy('id','DESC')->paginate(12);
        $users = User::orderBy('name', 'ASC')
        ->orderBy('image', 'DESC')
        ->paginate(12);
        return view('admin.slides', compact('slides','users'));
    }
    public function slide_add()
    {
        return view('admin.slide-add');
    }

    public function slide_store(Request $request)
    {
        $request->validate([
            'tagline'=> 'required',
            'title'=> 'required',
            'subtitle'=> 'required',
            'link'=> 'required',
            'status'=> 'required',
            'image'=> 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $slide = new Slide();
        $slide->tagline = $request->tagline;
        $slide->title = $request->title;
        $slide->subtitle = $request->subtitle;
        $slide->link = $request->link;
        $slide->status = $request->status;

        $image = $request->file('image');
        $file_extention = $request->file('image')->extension();
        $image_name = Carbon::now()->timestamp.'.'.$file_extention;
        $this->GenerateSlideThumbailsImage($image, $image_name);
        $slide->image = $image_name;
        $slide->save();
        return redirect()->route('admin.slides')->with("Trạng thái","Slide đã được thêm vào!");
    }

    public function GenerateSlideThumbailsImage($image, $imageName)
    {
        $destinationPath = public_path('uploads/slides');
        $img = Image::read($image->path());
        $img->cover(400,600,"top");
        $img->resize(400,600, function($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
    }
    public function slide_edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide-edit', compact('slide'));
    }

    public function slide_update(Request $request)
    {
        $request->validate([
            'tagline'=> 'required',
            'title'=> 'required',
            'subtitle'=> 'required',
            'link'=> 'required',
            'status'=> 'required',
            'image'=> 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
            $slide = Slide::find($request->id);
            $slide->tagline = $request->tagline;
            $slide->title = $request->title;
            $slide->subtitle = $request->subtitle;
            $slide->link = $request->link;
            $slide->status = $request->status;
        
        if( $request->hasFile('image') )
        {
            if(File::exists(public_path('uploads/slides').'/'.$slide->image))
            {
                File::delete(public_path('uploads/slides').'/'.$slide->image);
            }

            $image = $request->file('image');
            $file_extention = $request->file('image')->extension();
            $image_name = Carbon::now()->timestamp.'.'.$file_extention;
            $this->GenerateSlideThumbailsImage($image, $image_name);
            $slide->image = $image_name;

        }
        $slide->save();
        return redirect()->route('admin.slides')->with("Trạng thái","Slide đã được cập nhật!");
    }

    public function slide_delete($id)
    {
        $slide = Slide::find($id);
        if(File::exists(public_path('uploads/slides').'/'.$slide->image))
        {
            File::delete(public_path('uploads/slides').'/'.$slide->image);
        }
        $slide->delete();
        return redirect()->route('admin.slides')->with("Trạng thái","Slide đã được xoá!");

    }

    public function contacts()
    {
        $contacts = Contact::orderBy('created_at','DESC')->paginate(10);
        $users = User::orderBy('name', 'ASC')
        ->orderBy('image', 'DESC')
        ->paginate(12);
        return view('admin.contacts', compact('contacts', 'users'));

    }

    public function contact_delete($id)
    {
        $contacts = Contact::find($id);
        $contacts->delete();
        return redirect()->route('admin.contacts')->with('status', 'Xoá liên hệ thành công!');
    }

    public function contact_show($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('admin.contacts-show', compact('contacts'));

    }

    public function sendResponse(Request $request, $id)
    {
        // Tìm đối tượng Contact
        $contacts = Contact::findOrFail($id);
        
        // Gán nội dung phản hồi từ request
        $contacts->response = $request->input('response');
        
        // Lưu thông tin phản hồi vào cơ sở dữ liệu
        $contacts->save();
        
        // Sử dụng Mailable ContactResponse để gửi email
        Mail::to($contacts->email)->send(new ContactResponse($contacts));

        return redirect()->route('admin.contact.show', ['id' => $contacts->id])->with('success', 'Phản hồi đã được gửi thành công.');
    }
    

    public function users()
    {
        $users = User::withSum('orders as total_spent', 'total') // Tính tổng tiền của mỗi người dùng
                 ->orderBy('created_at', 'DESC')
                 ->orderBy('image', 'DESC')
                 ->paginate(12);
        return view('admin.users', compact('users'));
    }    
    public function users_store(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users,mobile',
            'password' => 'required|string|min:8',
            'utype' => 'in:ADM,USR', // Chỉ cho phép 'ADM' hoặc 'USR'
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048', // Yêu cầu ảnh định dạng png, jpg, jpeg
        ]);
    
        // Tạo đối tượng User mới
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->mobile = $request->mobile;
        $users->password = bcrypt($request->password); // Mã hóa mật khẩu
        $users->utype = $request->utype ?? 'USR'; // Nếu không có giá trị thì mặc định là 'USR'
    
        // Xử lý ảnh đại diện (nếu có tải lên)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_extension = $image->extension();
            $image_name = Carbon::now()->timestamp . '.' . $file_extension;
    
            // Gọi hàm xử lý ảnh để tạo thumbnail và lưu
            $this->GenerateUserAvatar($image, $image_name);
    
            // Lưu tên file vào cơ sở dữ liệu
            $users->image = $image_name;
        }
    
        // Lưu người dùng vào cơ sở dữ liệu
        $users->save();
    
        // Chuyển hướng với thông báo trạng thái
        return redirect()->route('admin.users')->with('status', 'Người dùng đã được thêm thành công!');
    }
    
    public function GenerateUserAvatar($image, $imageName)
    {
        // Đường dẫn lưu trữ
        $destinationPath = public_path('assets/images/avatar');
    
        // Đọc và xử lý ảnh
        $img = Image::make($image->path());
        $img->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath . '/' . $imageName);
    }

    public function users_delete($id)
    {
        $users = Brand::find($id);
        if(File::exists(public_path('assets/images/avatar').'/'.$users->image))
        {
            File::delete(public_path('assets/images/avatar').'/'.$users->image);
        }
        $users->delete();
        return redirect()->route('admin.users')->with('status','Người dùng đã được xóa thành công!');
    }



    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name','LIKE',"%{$query}%")->get()->take(8);
        return response()->json($results);
    }

    public function review()
    {
        // Lấy danh sách các review với thông tin sản phẩm và người dùng, phân trang
        $reviews = Review::with('product', 'user') 
                          ->orderBy('created_at', 'DESC')
                          ->paginate(10); // Chỉ gọi paginate một lần
            
        // Lấy danh sách người dùng (User), phân trang
        $users = User::orderBy('name', 'ASC')
                     ->orderBy('id', 'DESC')
                     ->orderBy('image', 'DESC')
                     ->paginate(12);
                     
        // Trả về view với các dữ liệu reviewst và users
        return view('admin.reviews', compact('reviews', 'users'));
    }
    
    public function approveReview($id)
    {
        $review = Review::find($id);
    
        if ($review) {
            // Cập nhật trạng thái của đánh giá
            $review->status = 'approved';
            $review->save();
            
            return response()->json(['success' => true, 'message' => 'Đánh giá đã được duyệt.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Đánh giá không tồn tại.'], 404);
        }
    }
    
    
    

    public function review_delete($id)
    {
        $reviews = Review::find($id);
        $reviews->delete();
        return redirect()->route('admin.reviews')->with('status', 'Xoá liên hệ thành công!');
    }
    

    public function index_1()
    {
        $slides = Slide::where('status',1)->get()->take(3);
        $brands = Brand::orderBy('name')->get();
        $sproducts = Product::whereNotNull('sale_price')->where('sale_price','<>','')->inRandomOrder()->get()->take(8);
        $fproducts = Product::where('featured', 1)->get()->take(8);
        return view('index', compact('slides','brands','sproducts','fproducts'));
    }

}
