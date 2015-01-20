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
        $products = Product::orderBy('title')->get();

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

        $cats = ProductCategory::orderBy('category_name')->get();
        $categories = array();

        foreach ($cats as $c)
        {
            $categories[$c->id] = $c->category_name;
        }

        return View::make('vcms::admin.products-edit-product')
            ->with('product_id', Input::get('id'))
            ->with('product', $product)
            ->with('categories', $categories);
    }

    public function postEditProduct()
    {
        $id = Input::get('product_id');

        if ($id > 0)
        {
            $product = Product::find($id);
        } else
        {
            $product = new Product;
        }

        $product->title = Input::get('title');
        $product->title_fr = Input::get('title_fr');
        $product->description = Input::get('description');
        $product->description_fr = Input::get('description_fr');
        $product->active = Input::get('active');
        $product->electric_heat = Input::get('electric_heat');
        $product->communications_panel = Input::get('communications_panel');
        $product->ac = Input::get('ac');
        $product->electric_mast = Input::get('electric_mast');
        $product->drawing_tables = Input::get('drawing_tables');
        $product->emergency_lights = Input::get('emergency_lights');
        $product->coat_hooks = Input::get('coat_hooks');
        $product->bulletin_boards = Input::get('bulletin_boards');
        $product->window_bars = Input::get('window_bars');
        $product->office_desks = Input::get('office_desks');
        $product->office_chairs = Input::get('office_chairs');
        $product->folding_chairs = Input::get('folding_chairs');
        $product->folding_tables = Input::get('folding_tables');
        $product->filing_cabinets = Input::get('filing_cabinets');
        $product->lockers = Input::get('lockers');
        $product->fridges = Input::get('fridges');
        $product->microwaves = Input::get('microwaves');
        $product->water_coolers = Input::get('water_coolers');
        $product->insurance = Input::get('insurance');
        $product->category_id = Input::get('category_id');
        $product->save();

        $id = $product->id;

        if (Input::get('action') == 0)
            return Redirect::to('/admin/products/all-products');
        else
            return Redirect::to('/admin/products/product?id=' . $id);
    }


    public function getDeleteproduct()
    {
        $product = Product::find(Input::get('id'));
        $product->delete();
        return Redirect::to('/admin/products/all-products');
    }

}
