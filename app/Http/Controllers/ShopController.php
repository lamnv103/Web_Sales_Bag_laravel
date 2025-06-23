<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Review;

class ShopController extends Controller
{
    public function index(Request $request) 
    {
        $size = $request->query('size') ? $request->query('size') :12;
        $o_column = "";
        $o_order = "";
        $order = $request->query('order') ? $request->query('order') : -1;
        $f_brands = $request->query('brands');
        $f_categories = $request->query('categories');
        $min_price = $request->query('min') ? $request->query('min') : 100;
        $max_price = $request->query('max') ? $request->query('max') : 5000;

        switch($order)
        {
            case 1:
                $o_column = 'created_at';
                $o_order = 'DESC';
                break;
            case 2:
                $o_column = 'created_at';
                $o_order = 'ASC';
                break;
            case 3:
                $o_column = 'sale_price';
                $o_order = 'ASC';
                break;
            case 4:
                $o_column = 'sale_price';
                $o_order = 'DESC';
                break;
            default:
                $o_column = 'id';
                $o_order = 'DESC';

        }
        $brands = Brand::orderBy('name','ASC')->get();
        $categories= Category::orderBy('name','ASC')->get();

        $products = Product::where(function($query) use($f_brands){
                $query->whereIn('brand_id',explode(',',$f_brands))->orWhereRaw("'".$f_brands."'=''");
        })
        ->where(function($query) use($f_categories){
            $query->whereIn('category_id',explode(',',$f_categories))->orWhereRaw("'".$f_categories."'=''");
        })
        ->where(function($query) use($min_price, $max_price){
            $query->whereBetween('regular_price', [$min_price, $max_price])
            ->orWhereBetween('sale_price', [$min_price, $max_price]);
        })
                            ->orderBy($o_column,$o_order)->paginate($size);
        return view('shop', compact('products','size', 'order', 'brands','f_brands','categories','f_categories','min_price','max_price'));
    }

    public function product_details($product_slug)
    {
        // Lấy thông tin sản phẩm dựa trên slug
        $product = Product::where('slug', $product_slug)->first();
    
        // Kiểm tra nếu không tìm thấy sản phẩm
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại');
        }
    
        // Lấy các sản phẩm khác, ngoại trừ sản phẩm hiện tại
        $rproducts = Product::where('slug', '<>', $product_slug)->take(8)->get();
    
        // Lấy các đánh giá của sản phẩm, bao gồm thông tin người dùng đã đánh giá
        $reviews = Review::where('product_id', $product->id) // Sử dụng ID sản phẩm đã lấy
                        ->where('status', 'approved') // Chỉ lấy đánh giá đã duyệt
                        ->with('user')  // Eager load quan hệ với bảng User
                                        ->get();
    
        // Trả về view và truyền các dữ liệu
        return view('details', compact('product', 'rproducts', 'reviews'));
    }
    
}
