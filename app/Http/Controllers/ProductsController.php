<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;
use App\Exceptions\InvalidRequestException;
class ProductsController extends Controller
{
    //
    public function index(Request $request){
        $builder = Product::query()->where('on_sale',true);
        if ($search = $request->input('search','')) {
            $like = '%'.$search.'%';
            $builder->where(function($query) use ($like){
                $query->where('title','like',$like)
                ->orWhere('description','like',$like)
                ->orWhereHas('skus',function($query) use ($like){
                    $query->where('title','like',$like)
                    ->orWhere('description','like',$like);
                });
            });
        }
        // 是否有提交 order 参数，如果有就赋值给 $order 变量
        // order 参数用来控制商品的排序规则
        if ($order = $request->input('order', '')) {
            // 是否是以 _asc 或者 _desc 结尾
            if (preg_match('/^(.+)_(asc|desc)$/', $order, $m)) {
                // 如果字符串的开头是这 3 个字符串之一，说明是一个合法的排序值
                if (in_array($m[1], ['price', 'sold_count', 'rating'])) {
                    // 根据传入的排序值来构造排序参数
                    $builder->orderBy($m[1], $m[2]);
                }
            }
        }

        $products = $builder->paginate(16);

        return view('products.index',['products' => $products,
            'filters'=>[
                'search' => $search,
                'order' => $order
            ]
         ]);
    }
    public function show(Product $product,Request $request){
        if (!$product->on_sale) {
            throw new InvalidRequestException('商品未上架');
        }
        $favord = false;
        if ($user = $request->user()) {
            $favord = boolval($user->favoriteProducts->find($product->id));
        }
        $reviews = OrderItem::query()
            ->with(['order.user', 'productSku']) // 预先加载关联关系
            ->where('product_id', $product->id)
            ->whereNotNull('reviewed_at') // 筛选出已评价的
            ->orderBy('reviewed_at', 'desc') // 按评价时间倒序
            ->limit(10) // 取出 10 条
            ->get();

      
        return view('products.show',['product' => $product,'favord' => $favord,'reviews' => $reviews]);
    }
    public function favor(Product $product,Request $request){
        $user = $request->user();
        //dd($user->favoriteProducts);
        //return $user->favoriteProducts;
        if ($user->favoriteProducts->find($product->id)) {
            return [];
        }
        $user->favoriteProducts()->attach($product);
        return [];
    }
    public function disfavor(Product $product, Request $request)
    {
        $user = $request->user();
        $user->favoriteProducts()->detach($product);
        return [];
    }
    public function favorites(Request $request){
        $products = $request->user()->favoriteProducts()->paginate(16);
        return view('products.favorites',['products' => $products]);
    }
}
