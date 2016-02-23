<?php


class NewsletterController extends BaseController
{


    public function getCreate()
    {
        if (Input::has('id')) {
            $newsletter = Newsletter::find(Input::get('id'));
        } else {
            $newsletter = new Newsletter();
        }
        return View::make('vcms::admin.create-newsletter')
            ->with('page_title', 'Create Newsletter')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('newsletter', $newsletter);
    }


    public function postCreate()
    {
        $image_name = "";
        $ext = "";

        if (Input::get('id') > 0) {
            $newsletter = Newsletter::find(Input::get('id'));
        } else {
            $newsletter = new Newsletter();
        }

        if (Input::hasFile('image_name')) {
            $image_name = str_random(40);
            $ext = Input::file('image_name')->getClientOriginalExtension();
            Request::file('image_name')->move(base_path() . "/public/newsletter_images/", $image_name . "." . $ext);
        }

        $title = Input::get('article_title');
        $content = Input::get('article_content');

        $html = View::make('emails.newsletter')
            ->with('image', $image_name . "." . $ext)
            ->with('content', $content)
            ->render();

        $newsletter->article_title = $title;
        $newsletter->article_content = $content;
        $newsletter->newsletter = $html;

        if (Input::hasFile('image_name'))
            $newsletter->image_name = $image_name;
        $newsletter->save();
        $id = $newsletter->id;




        if (Input::get('action') == 'send') {

            $data = [
                'image'   => $image_name . "." . $ext,
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
        } else {
            return Redirect::to('/admin/newsletter/create?id=' . $id)
                ->with('message', 'Changes saved');
        }
    }


    public function previewNewsletter()
    {

        if (Input::get('id') > 0) {
            $newsletter = Newsletter::find(Input::get('id'));
        } else {
            $newsletter = new Newsletter();
        }

        $image_name = "";
        $ext = "";

        $title = Input::get('article_title');
        $content = Input::get('article_content');

        if (Input::hasFile('image_name')) {
            $image_name = str_random(40);
            $ext = Input::file('image_name')->getClientOriginalExtension();
            Request::file('image_name')->move(base_path() . "/public/newsletter_images/", $image_name . "." . $ext);
        }

        $html = View::make('emails.newsletter')
            ->with('image', $image_name . "." . $ext)
            ->with('content', $content)
            ->render();

        $newsletter->article_title = $title;
        $newsletter->article_content = $content;
        $newsletter->newsletter = $html;

        if (Input::hasFile('image_name'))
            $newsletter->image_name = $image_name;
        $newsletter->save();

        return $html;
    }

}
