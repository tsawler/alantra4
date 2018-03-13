<?php

class SubscriberController extends BaseController {

    public function postSubscribe()
    {
        $email = Input::get('email');

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sub = new Subscriber;
            $sub->email = $email;
            $sub->save();

            $data = [

            ];

            $user_data = [
                'email' => $email,
            ];

            Mail::queue('emails.join', $data, function ($message) use ($user_data) {
                $message->from('donotreply@alantraleasing.com', 'Do not reply');
                $message->to($user_data['email'])->subject('Welcome to Alantra\'s Newsletter');
            });

            return Redirect::to('/thanks');
        } else {
            return Redirect::to('/');
        }
    }

}
