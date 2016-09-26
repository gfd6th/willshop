<?php

namespace App\Api\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ProductController extends BaseController
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var ProductCategory
     */
    private $productCategory;

    /**
     * ProductCategoryController constructor.
     *
     * @param Product         $product
     * @param ProductCategory $productCategory
     */
    public function __construct(Product $product, ProductCategory $productCategory)
    {
        $this->product = $product;
        $this->productCategory = $productCategory;
    }

    /**
     * 商品列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function lists()
    {

        $products = $this->product->take(6)->get();

        return response()->json(compact('products'));
    }

    /**
     * 商品详情
     *
     * @param int $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->product->findOrFail($id);
    }
}
