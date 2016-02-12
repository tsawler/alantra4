<?php

class NewsletterController extends BaseController
{


    public function getCreate()
    {
        return View::make('vcms::admin.create-newsletter')
            ->with('page_title', 'Create Newsletter')
            ->with('meta_tags', '')
            ->with('meta', '');
    }



}
