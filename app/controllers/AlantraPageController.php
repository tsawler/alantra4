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

        Cache::flush();
        $page->save();

        return Redirect::to('/admin/page/all-pages')->with('message', 'Page saved successfully');
    }

}
