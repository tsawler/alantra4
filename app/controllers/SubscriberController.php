<?php

class SubscriberController extends BaseController {

    public function postSubscribe()
    {
        $sub = new Subscriber;
        $sub->email = Input::get('email');
        $sub->save();

        return Redirect::to('/thanks');
    }

}
