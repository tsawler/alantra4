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

    public function getAllProducts()
    {
        $products = Product::orderBy('product_name');

        return View::make('vcms::admin.products-list-all')
            ->with('page_title', 'Products')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('products', $products);
    }


    public function getEditProduct()
    {
        if (Input::get('id') > 0)
        {
            $product = Product::find(Input::get('id'));
        } else
        {
            $product = new Product;
        }

        return View::make('vcms::admin.products-edit-product')
            ->with('product_id', Input::get('id'))
            ->with('product', $product);
    }


}
