<?php

class QuoteController extends BaseController {

    public function getQuote()
    {
        return View::make('vcms.quote')
            ->with('page_title', 'Request a Quote')
            ->with('meta_tags', '')
            ->with('meta', '');
    }

    public function postQuote()
    {
        return "foo";
    }

}
