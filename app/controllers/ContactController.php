<?php

class ContactController extends BaseController {

    public function getContact()
    {
        return View::make('vcms.contact')
            ->with('page_title', 'Contact')
            ->with('meta_tags', '')
            ->with('meta', '');
    }

    public function postContact()
    {
        return "foo";
    }

}
