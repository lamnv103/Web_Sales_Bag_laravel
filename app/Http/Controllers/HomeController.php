<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\reviews;
use App\Models\Brand;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Review;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Laravel\Facades\Image;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::where('status',1)->get()->take(3);
        $brands = Brand::orderBy('name')->get();
        $sproducts = Product::whereNotNull('sale_price')->where('sale_price','<>','')->inRandomOrder()->get()->take(8);
        $fproducts = Product::where('featured', 1)->get()->take(8);
        return view('index', compact('slides','brands','sproducts','fproducts'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:100',
            'email'=> 'required|email',
            'phone' => 'required|numeric|digits:10',
            'comment'=> 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->comment = $request->comment;
        $contact->save();
        return redirect()->back()->with('success','Tin nhắn của bạn đẫ được gửi đi!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name','LIKE',"%{$query}%")->get()->take(8);
        return response()->json($results);
    }

    public function review_store(Request $request)
{
    try {
        // Xác thực dữ liệu
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'order_id' => 'required|exists:orders,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            'product_image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Kiểm tra nếu người dùng đã đánh giá sản phẩm này
        $existingReview = Review::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('order_id', $request->order_id)
            ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'Bạn đã đánh giá sản phẩm này rồi.');
        }

        // Kiểm tra trạng thái đơn hàng
        $order = Order::findOrFail($request->order_id);
        if ($order->status !== 'delivered') {
            return redirect()->back()->with('error', 'Bạn chỉ có thể đánh giá sau khi nhận hàng.');
        }

        // Khởi tạo đối tượng Review
        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $request->product_id;
        $review->order_id = $request->order_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;

        // Xử lý ảnh nếu có
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $file_extension = $image->extension();
            $image_name = Carbon::now()->timestamp . '.' . $file_extension;

            // Gọi hàm xử lý ảnh
            $this->GenerateReviewThumbnailImage($image, $image_name);

            // Lưu đường dẫn ảnh vào cơ sở dữ liệu
            $review->image_path = $image_name;
        }

        // Lưu đánh giá vào cơ sở dữ liệu
        $review->save();

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi thành công!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
    }
}


    
    public function GenerateReviewThumbnailImage($image, $imageName)
    {
        // Đường dẫn lưu ảnh
        $destinationPath = public_path('uploads/Comment');
    
        // Đọc ảnh từ đường dẫn tạm thời
        $img = Image::read($image->path());
    
        // Cắt ảnh và chỉnh sửa kích thước
        $img->cover(400, 600, "top");  // Cắt ảnh để có kích thước 400x600, với phần trên của ảnh làm trọng tâm
        $img->resize(400, 600, function($constraint) {
            $constraint->aspectRatio();  // Đảm bảo tỉ lệ khung hình được giữ nguyên
        })->save($destinationPath . '/' . $imageName);  // Lưu ảnh đã được xử lý
    }
    
    
    public function review_create($orderId)
{
    // Lấy tất cả sản phẩm trong đơn hàng
    $orderItems = OrderItem::where('order_id', $orderId)
        ->with('product')
        ->get();

    // Kiểm tra xem mỗi sản phẩm đã được đánh giá chưa
    foreach ($orderItems as $item) {
        $item->reviewed = Review::where('user_id', Auth::id())
            ->where('product_id', $item->product_id)
            ->where('order_id', $orderId)
            ->exists();
    }
    
    // Truyền toàn bộ danh sách sản phẩm cho view
    return view('user.reviews', compact('orderItems', 'orderId'));
}


    
}
