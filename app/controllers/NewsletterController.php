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

        if (Input::get('id') > 0) {
            $newsletter = Newsletter::find(Input::get('id'));
        } else {
            $newsletter = new Newsletter();
        }

        if (Input::get('action') == 'preview') {
            $title = Input::get('article_title');
            $content = Input::get('article_content');
            $new_content = str_replace('src="/', 'src="' . getenv('SECURE_URL') . '/', $content);

            $newsletter->article_title = $title;
            $newsletter->article_content = $new_content;

            list($image_name, $ext) = $this->handleImage();

            $html = View::make('emails.newsletter')
                ->with('image', $image_name . "." . $ext)
                ->with('content', $new_content)
                ->render();

            return $html;
        }

        list($image_name, $ext) = $this->handleImage();

        $title = Input::get('article_title');
        $content = Input::get('article_content');
        $new_content = str_replace('src="/', 'src="' . getenv('SECURE_URL') . '/', $content);

        $html = View::make('emails.newsletter')
            ->with('image', $image_name . "." . $ext)
            ->with('content', $new_content)
            ->render();

        $newsletter->article_title = $title;
        $newsletter->article_content = $new_content;
        $newsletter->newsletter = $html;

        if (Input::hasFile('image_name'))
            $newsletter->image_name = $image_name . "." . $ext;
        $newsletter->save();
        $id = $newsletter->id;


        if (Input::get('action') == 'send') {

            $data = [
                'image'   => $image_name . "." . $ext,
                'content' => $new_content,
            ];

            $user_data = [
                'email' => 'trevor.sawler@gmail.com',
            ];

            Mail::later(5, 'emails.newsletter', $data, function ($message) use ($user_data) {
                $message->from('donotreply@alantraleasing.com', 'Do not reply');
                $message->to($user_data['email'])->subject('Request for Quotation from website');
            });

            $newsletter->sent = 1;
            $newsletter->save();

            return Redirect::to('/admin/newsletter/drafts')
                ->with("message", "Newsletter sent!");
        } else {
            return Redirect::to('/admin/newsletter/create?id=' . $id)
                ->with('message', 'Changes saved');
        }
    }


    public function drafts()
    {
        $newsletters = Newsletter::where('sent', '=', '0')->orderBy('article_title')->get();

        return View::make('vcms::admin.newsletters-drafts')
            ->with('newsletters', $newsletters);
    }


    public function archives()
    {
        $newsletters = Newsletter::where('sent', '=', '1')->orderBy('article_title')->get();

        return View::make('vcms::admin.newsletters-archives')
            ->with('newsletters', $newsletters);
    }


    public function subscribers()
    {
        $subscribers = Subscriber::orderBy('email')->get();

        return View::make('vcms::admin.newsletter-subscribers')
            ->with('subscribers', $subscribers);
    }


    public function deleteSubscriber() {
        Subscriber::find(Input::get('id'))->delete();
        return Redirect::to('/admin/newsletter/subscribers');
    }


    public function addSubscriber() {
        if (filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) {
            $sub = new Subscriber();
            $sub->email = Input::get('email');
            $sub->save();

            return Redirect::to('/admin/newsletter/subscribers')
                ->with('message', 'Subscriber added');
        } else {
            return Redirect::to('/admin/newsletter/subscribers')
                ->with('error', 'Invalid email!');
        }
    }

    /**
     * @return array
     */
    protected function handleImage()
    {
        $image_name = "";
        $ext = "";

        if (Input::hasFile('image_name')) {
            $image_name = str_random(40);
            $ext = Input::file('image_name')->getClientOriginalExtension();
            Request::file('image_name')->move(base_path() . "/public/newsletter_images/", $image_name . "." . $ext);

            $img = Image::make(base_path() . "/public/newsletter_images/" . $image_name . "." . $ext);
            $height = $img->height();
            $width = $img->width();

            if (($height < 100) || ($width < 800)) {
                exit;
            }

            if (($width > 800) || ($height > 300)) {
                // this image is very large; we'll need to resize it.
                $img = $img->fit(800, 300);
                $img->save();

                return [$image_name, $ext];
            }

            return [$image_name, $ext];
        }

        return [$image_name, $ext];
    }

}
