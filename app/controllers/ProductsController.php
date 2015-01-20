<?php

class ProductsController extends BaseController {

    public function allProducts()
    {
        $products = Product::all();
        return View::make('products')
            ->with('page_title', 'Products')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('products', $products);
    }


}
