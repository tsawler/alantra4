<?php

class AlantraPageController extends \verilion\vcms\PageController {

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
            $page = verilion\vcms\Page::find($page_id);
        } else
        {
            $page = new Page;
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

        $page_id = $page->save();

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

            if (($height < 532) || ($width < 1600))
            {
                File::delete($destinationPath . $filename);
                return Redirect::to('/admin/pages/page?id=' . $id)
                    ->with('error', 'Your image is too small. It must be at least '
                        . '1600 '
                        . ' pixels wide, and '
                        . '532 '
                        . ' pixels tall!');
                exit;
            }

            $thumb_img->fit(Config::get('vcms::thumb_size'), Config::get('vcms::thumb_size'))
                ->save($destinationPath . "thumbs/" . $filename);

            unset($thumb_img);
            $img = Image::make($destinationPath . $filename);

            $width = $img->width();
            if (($width > 1600) || ($height > 532))
            {
                // this image is very large; we'll need to resize it.
                $img = $img->fit(1600, 532);
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

        return Redirect::to('/admin/page/all-pages')->with('message', 'Page saved successfully');
    }

}
