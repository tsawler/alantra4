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

    public function getProductPublic()
    {
        $slug = Request::segment(2);
        $product_id = 0;

        $results = DB::table('products')->where('slug', '=', $slug)
            ->remember(Config::get('vcms::cache_lifetime'))
            ->get();

        foreach ($results as $result)
        {
            $active = $result->active;
            if ($active > 0)
            {
                $product_id = $result->id;

            }
        }

        if ($product_id > 0)
        {
            $product = Product::find($product_id);
        } else
        {
            return Redirect::to('/error');
        }

        return View::make('product')
            ->with('page_title', '')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('product', $product);

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
        $file = Input::file('image_name');

        if ($id > 0)
        {
            $product = Product::find($id);
        } else
        {
            $product = new Product;
        }

        $product->title = Input::get('title');
        $product->slug = Str::slug(Input::get('title'));
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

        // handle image, if any
        if (Input::hasFile('image_name'))
        {
            $destinationPath = base_path() . '/public/product_images/';
            $filename = $file->getClientOriginalName();
            $upload_success = Input::file('image_name')->move($destinationPath, $filename);
            if (!File::exists($destinationPath . "thumbs"))
            {
                File::makeDirectory($destinationPath . "thumbs");
            }
            $thumb_img = Image::make($destinationPath . $filename);
            $height = $thumb_img->height();
            $width = $thumb_img->width();

            if (($height < Config::get('vcms::min_img_height')) || ($width < Config::get('vcms::min_img_width')))
            {
                return Redirect::to('/admin/products/product?id=' . $id)
                    ->with('error', 'Your image is too small. It must be at least '
                        . Config::get('vcms::min_img_width')
                        . ' pixels wide, and '
                        . Config::get('vcms::min_img_height')
                        . ' pixels tall!');
                File::delete($destinationPath . $filename);
                exit;
            }

            $thumb_img->fit(Config::get('vcms::thumb_size'), Config::get('vcms::thumb_size'))
                ->save($destinationPath . "thumbs/" . $filename);

            unset($thumb_img);
            $img = Image::make($destinationPath . $filename);

            $width = $img->width();
            if (($width > Config::get('vcms::max_img_width')) || ($height > Config::get('vcms::max_image_height')))
            {
                // this image is very large; we'll need to resize it.
                $img = $img->fit(Config::get('vcms::max_img_width'), Config::get('vcms::max_img_height'));
                $img->save();
            }

            if ($upload_success)
            {
                $item = new ProductImage;
                $item->product_id = $id;
                $item->image_name = $filename;
                $item->save();
            }

        }

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


    public function getDeleteProductImage()
    {
        $product = ProductImage::find(Input::get('id'));
        $product->delete();

        return Redirect::to('/admin/products/product?id=' . Input::get('pid'));
    }

}
