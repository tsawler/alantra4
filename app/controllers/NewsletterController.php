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

        if (Input::get('action') == 'preview') {
            if (Input::get('id') > 0) {
                $newsletter = Newsletter::find(Input::get('id'));
            } else {
                $newsletter = new Newsletter();
            }

            $image_name = "";
            $ext = "";

            $title = Input::get('article_title');
            $content = Input::get('article_content');

            $newsletter->article_title = $title;
            $newsletter->article_content = $content;

            if (Input::hasFile('image_name')) {
                $image_name = str_random(40);
                $ext = Input::file('image_name')->getClientOriginalExtension();
                Request::file('image_name')->move(base_path() . "/public/newsletter_images/", $image_name . "." . $ext);

                $img = Image::make(base_path() . "/public/newsletter_images/" . $image_name . "." . $ext);
                $height = $img->height();
                $width = $img->width();

                if (($height < 100) || ($width < 800))
                {
                    exit;
                }

                if (($width > 800) || ($height > 300 ))
                {
                    // this image is very large; we'll need to resize it.
                    $img = $img->fit(800, 300);
                    $img->save();
                }
            }

            $html = View::make('emails.newsletter')
                ->with('image', $image_name . "." . $ext)
                ->with('content', $content)
                ->render();

            return $html;
        }

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
            Input::file('image_name')->move(base_path() . "/public/newsletter_images/", $image_name . "." . $ext);
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


    }



    public function drafts() {
        $newsletters = Newsletter::where('sent','=','0')->orderBy('article_title')->get();

        return View::make('vcms::admin.newsletters-drafts')
            ->with('newsletters', $newsletters);
    }

}
