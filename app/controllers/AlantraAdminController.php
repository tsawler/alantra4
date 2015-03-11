<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use verilion\vcms\AdminController;

class AlantraAdminController extends AdminController {

    /**
     * Display dashboard
     *
     * @return mixed
     */
    public function getDashboard()
    {
        $quote_count = Quote::count();
        $contact_count = Contact::count();

        return View::make('vcms::admin.index')
            ->with('contacts', $contact_count)
            ->with('quotes', $quote_count);
    }
}
