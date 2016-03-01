<?php

class SubscriberController extends BaseController {

    public function postSubscribe()
    {
        $sub = new Subscriber;
        $sub->email = Input::get('email');
        $sub->save();

        $data = [

        ];

        $user_data = [
            'email' => Input::get('email'),
        ];

        Mail::queue('emails.join', $data, function ($message) use ($user_data) {
            $message->from('donotreply@alantraleasing.com', 'Do not reply');
            $message->to($user_data['email'])->subject('Welcome to Alantra\'s Newsletter');
        });

        return Redirect::to('/thanks');
    }

}
