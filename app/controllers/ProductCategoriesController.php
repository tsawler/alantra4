<?php

class ProductCategoriesController extends BaseController {


    /**
     * @return mixed
     */
    public function allCategories()
    {
        $categories = ProductCategory::orderBy('category_name')->get();

        return View::make('products')
            ->with('page_title', 'Products')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('categories', $categories);
    }


    /**
     * @return mixed
     */
    public function getAllProductCategories()
    {
        $categories = ProductCategory::orderBy('category_name')->get();

        return View::make('vcms::admin.product-categories-list-all')
            ->with('page_title', 'Product Categories')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('categories', $categories);
    }


    /**
     * @return mixed
     */
    public function getEditCategory()
    {
        if (Input::get('id') > 0)
        {
            $category = ProductCategory::find(Input::get('id'));
        } else
        {
            $category = new ProductCategory;
        }

        return View::make('vcms::admin.product-categories-edit-category')
            ->with('category_id', Input::get('id'))
            ->with('category', $category);
    }

    /**
     * @return mixed
     */
    public function postEditCategory()
    {
        $id = Input::get('category_id');

        if ($id > 0)
        {
            $category = ProductCategory::find($id);
        } else
        {
            $category = new ProductCategory();
        }

        $category->category_name = Input::get('category_name');
        $category->category_name_fr = Input::get('category_name_fr');
        $category->slug = Str::slug(Input::get('category_name'));
        $category->description = Input::get('description');
        $category->description_fr = Input::get('description_fr');

        $category->save();

        return Redirect::to('/admin/product-categories/all-product-categories');
    }


    /**
     * @return mixed
     */
    public function getDeleteCategory()
    {
        $category = ProductCategory::find(Input::get('id'));
        $category->delete();
        return Redirect::to('/admin/product-categories/all-product-categories');
    }


    /**
     * @return mixed
     */
    public function getCategoryPublic()
    {
        $c = Request::segment(2);
        $id = 0;

        // get all products for category name
        $cat = ProductCategory::where('slug','=', $c)->get();

        foreach ($cat as $ct){
            $id = $ct->id;
            $category = $ct;
            if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
            {
                $category_name = $ct->category_name_fr;
            } else
            {
                $category_name = $ct->category_name;
            }
        }

        $products = Product::where('category_id', '=', $id)
                        ->where('active', '=', 1)
                        ->orderBy('title')
                        ->get();

        return View::make('product-category')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('category_name', $category_name)
            ->with('category', $category)
            ->with('products', $products);

    }

}
