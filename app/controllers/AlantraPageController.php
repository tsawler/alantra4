<?php

class AlantraPageController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }


    /**
     * Show the home page
     *
     * @return mixed
     */
    public function showHome()
    {
        $page_title = "Not active";
        $page_content = "Either the page you requested is not active, or it does not exist.";
        $meta = "";
        $meta_keywords = "";
        $active = 1;
        $page_id = 0;
        $fragments = array();

        $results = DB::table('pages')->where('slug', '=', "home")->remember(Config::get('vcms::cache_lifetime'))->get();

        foreach ($results as $result)
        {
            $active = $result->active;

            if (($active > 0) || ((Auth::check()) && (Auth::user()->access_level == 3)))
            {
                if ((Session::get('lang') == null) || (Session::get('lang') == "en"))
                {
                    $page_title = $result->page_title;
                    $page_content = $result->page_content;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $fragments = AlantraPage::find($result->id)->fragments;
                } else
                {
                    $page_title = $result->page_title_fr;
                    $page_content = $result->page_content_fr;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $fragments = AlantraPage::find($result->id)->fragments;
                }

            }
        }

        $testimonials = Testimonial::orderByRaw("RANDOM()")->take(3)->get();

        return View::make('vcms.home')
            ->with('page_title', $page_title)
            ->with('page_content', $page_content)
            ->with('meta', $meta)
            ->with('meta_tags', $meta_keywords)
            ->with('active', $active)
            ->with('page_id', $page_id)
            ->with('fragments', $fragments)
            ->with('testimonials', $testimonials);
    }


    /**
     * Save edited page (called via ajax)
     *
     * @return string
     */
    public function savePage()
    {
        if (Auth::user()->hasRole('pages'))
        {

            $validator = null;

            if (Session::get('lang') == "en")
            {
                $update_rules = array(
                    'thedata'      => 'required|min:2',
                    'thetitledata' => 'required|min:2|unique:pages,page_title,' . Input::get('page_id')
                );
            } else
            {
                $update_rules = array(
                    'thedata'      => 'required|min:2',
                    'thetitledata' => 'required|min:2|unique:pages,page_title_fr,' . Input::get('page_id')
                );
            }
            $validator = Validator::make(Input::all(), $update_rules);

            if ($validator->passes())
            {

                $page = AlantraPage::find(Input::get('page_id'));
                if (Session::get('lang') == "fr")
                {
                    $page->page_content_fr = trim(Input::get('thedata'));
                    $page->page_title_fr = trim(Input::get('thetitledata'));
                } else
                {
                    $page->page_content = trim(Input::get('thedata'));
                    $page->page_title = trim(Input::get('thetitledata'));
                }
                $page->slug = Str::slug(Input::get('thetitledata'));
                $page->save();
                Cache::flush();

                return "Page updated successfully";
            } else
            {
                return "Error!";
            }
        } else
        {
            return "Access denied";
        }
    }


    /**
     * Show a page
     *
     * @return mixed
     */
    public function showPage()
    {
        $slug = Request::segment(1);
        $page_title = "Not active";
        $page_content = "Either the page you requested is not active, or it does not exist.";
        $meta = "";
        $meta_keywords = "";
        $active = 1;
        $page_id = 0;
        $images = null;

        $results = DB::table('pages')->where('slug', '=', $slug)->remember(Config::get('vcms::cache_lifetime'))->get();

        foreach ($results as $result)
        {
            $active = $result->active;
            if (($active > 0) || ((Auth::check()) && (Auth::user()->hasRole('pages'))))
            {
                if ((Session::get('lang') == null) || (Session::get('lang') == "en"))
                {
                    $page_title = $result->page_title;
                    $page_content = $result->page_content;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $images = AlantraPage::find($page_id)->images;
                } else
                {
                    $page_title = $result->page_title_fr;
                    $page_content = $result->page_content_fr;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $images = AlantraPage::find($page_id)->images;
                }

            }
        }

        return View::make('vcms.default-page')
            ->with('images', $images)
            ->with('page_title', $page_title)
            ->with('page_content', $page_content)
            ->with('meta', $meta)
            ->with('meta_tags', $meta_keywords)
            ->with('active', $active)
            ->with('page_id', $page_id);
    }


    /**
     * Generate a page without the top banner(s)
     * @return mixed
     */
    public function showPageNoBanner()
    {
        $slug = Request::segment(2);
        $page_title = "Not active";
        $page_content = "Either the page you requested is not active, or it does not exist.";
        $meta = "";
        $meta_keywords = "";
        $active = 1;
        $page_id = 0;
        $images = null;

        $results = DB::table('pages')->where('slug', '=', $slug)->remember(Config::get('vcms::cache_lifetime'))->get();

        foreach ($results as $result)
        {
            $active = $result->active;
            if (($active > 0) || ((Auth::check()) && (Auth::user()->hasRole('pages'))))
            {
                if ((Session::get('lang') == null) || (Session::get('lang') == "en"))
                {
                    $page_title = $result->page_title;
                    $page_content = $result->page_content;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $images = AlantraPage::find($page_id)->images;
                } else
                {
                    $page_title = $result->page_title_fr;
                    $page_content = $result->page_content_fr;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $images = AlantraPage::find($page_id)->images;
                }

            }
        }

        return View::make('vcms.default-page-no-banner')
            ->with('images', $images)
            ->with('page_title', $page_title)
            ->with('page_content', $page_content)
            ->with('meta', $meta)
            ->with('meta_tags', $meta_keywords)
            ->with('active', $active)
            ->with('page_id', $page_id);
    }


    /**
     * List all pages
     *
     * @return mixed
     */
    public function getAllPages()
    {
        $pages = AlantraPage::where('active', '=', '1')->orderby('page_title')->get();

        return View::make('vcms::admin.pages-list-all')
            ->with('allpages', $pages)
            ->with('page_name', '');
    }


    /**
     * Show page for edit or add
     *
     * @return mixed
     */
    public function getEditpage()
    {
        $page_id = Input::get('id');
        if ($page_id > 0)
        {
            $page = AlantraPage::find($page_id);
        } else
        {
            $page = new AlantraPage;
        }

        //dd($page->images);

        return View::make('vcms::admin.pages-edit-page')
            ->with('page_id', $page_id)
            ->with('page', $page);
    }


    /**
     * Delete a page
     *
     * @return mixed
     */
    public function getDeletePage()
    {
        $item = AlantraPage::find(Input::get('id'));
        $item->delete();

        return Redirect::to('/admin/page/all-pages')
            ->with('message', 'Page deleted');
    }


    /**
     * Save edited page
     *
     * @return mixed
     */
    public function postEditpage()
    {
        $page_id = Input::get('page_id');
        $file = Input::file('image_name');

        if ($page_id > 0)
        {
            $page = AlantraPage::find($page_id);
        } else
        {
            $page = new AlantraPage;
        }

        $page->page_title = trim(Input::get('page_title'));
        $page->active = Input::get('active');
        $page->page_content = trim(Input::get('page_content'));
        $page->meta = Input::get('meta');
        $page->meta_tags = Input::get('meta_tags');
        $page->slug = Str::slug(trim(Input::get('page_title')));

        if (Input::has('page_title_fr'))
        {
            $page->page_title_fr = Input::get('page_title_fr');
            $page->page_content_fr = Input::get('page_content_fr');
        }

        $page->save();
        $page_id = $page->id;

        // handle image, if any
        if (Input::hasFile('image_name'))
        {
            $destinationPath = base_path() . '/public/page_images/';
            $filename = $file->getClientOriginalName();
            $upload_success = Input::file('image_name')->move($destinationPath, $filename);
            if (!File::exists($destinationPath . "thumbs"))
            {
                File::makeDirectory($destinationPath . "thumbs");
            }
            $thumb_img = Image::make($destinationPath . $filename);
            $height = $thumb_img->height();
            $width = $thumb_img->width();

            if (($height < 350) || ($width < 1600))
            {
                File::delete($destinationPath . $filename);

                return Redirect::to('/admin/page/page?id=' . $page_id)
                    ->with('error', 'Your image is too small. It must be at least '
                        . '1600 '
                        . ' pixels wide, and '
                        . '350 '
                        . ' pixels tall!');
            }

            $thumb_img->fit(Config::get('vcms::thumb_size'), Config::get('vcms::thumb_size'))
                ->save($destinationPath . "thumbs/" . $filename);

            unset($thumb_img);
            $img = Image::make($destinationPath . $filename);

            $width = $img->width();
            if (($width > 1600) || ($height > 350))
            {
                // this image is very large; we'll need to resize it.
                $img = $img->fit(1600, 350);
                $img->save();
            }

            if ($upload_success)
            {
                $item = new PageImage;
                $item->page_id = $page_id;
                $item->image_name = $filename;
                $item->save();
            }

        }

        Cache::flush();

        if (Input::get('action') == 0)
            return Redirect::to('/admin/page/all-pages')->with('message', 'Page saved successfully');
        else
            return Redirect::to('/admin/page/page?id=' . $page_id);

    }


    /**
     * Delete an image from a page
     *
     * @return mixed
     */
    public function getDeletePageImage()
    {
        $product = PageImage::find(Input::get('id'));
        $product->delete();

        return Redirect::to('/admin/page/page?id=' . Input::get('pid'));
    }

}
