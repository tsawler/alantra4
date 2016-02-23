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


    public function postCreate()
    {
        $image_name = "";
        $img = "";
        $ext = "";
        if (Input::hasFile('image_name')) {
            $image_name = str_random(40);
            $ext = Input::file('image_name')->getClientOriginalExtension();
            Request::file('image_name')->move(base_path() . "/public/newsletter_images/", $image_name . "." . $ext);
            $type = pathinfo(base_path() . "/public/newsletter_images/". $image_name . "." . $ext, PATHINFO_EXTENSION);
            $data = file_get_contents(base_path() . "/public/newsletter_images/". $image_name . "." . $ext);
            $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }

        $title = Input::get('article_title');
        $content = Input::get('article_content');

        $newsletter = new Newsletter();
        $newsletter->article_title = $title;
        $newsletter->article_content = $content;
        $newsletter->image_name = $image_name;

        $html = View::make('emails.newsletter')
            ->with('image', $image_name . "." . $ext)
            ->with('img', $img)
            ->with('content', $content)
            ->render();

        if (Input::get('action') == 'send') {

            $data = [
                'image'   => $image_name . "." . $ext,
                'img'     => $img,
                'content' => $content
            ];

            $user_data = [
                'email' => 'trevor.sawler@gmail.com'
            ];

            Mail::later(5, 'emails.newsletter', $data, function ($message) use ($user_data) {
                $message->from('donotreply@alantraleasing.com', 'Do not reply');
                $message->to($user_data['email'])->subject('Request for Quotation from website');
            });

            return Redirect::to('/admin/dashboard')
                ->with("message", "Newsletter sent!");
        }
    }

}
