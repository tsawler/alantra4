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

        // save data
        $contact = new Contact;
        $contact->full_name = Input::get('contact_name');
        $contact->email = Input::get('contact_email');
        $contact->subject = Input::get('contact_subject');
        $contact->message = Input::get('contact_comment');
        $contact->save();

        // build email
        $user = array(
            'email'   => Input::get('contact_email'),
            'name'    => Input::get('contact_name'),
            'subject' => Input::get('contact_subject')
        );

        // the data that will be passed into the mail view blade template
        $data = array(
            'users_name'  => $user['name'],
            'the_message' => Input::get('contact_comment'),
            'email'       => Input::get('contact_email'),
            'subject'     => Input::get('contact_subject')
        );

        // use Mail::send function to send email passing the data and using the $user variable in the closure
        Mail::later(5, 'emails.contact_email', $data, function ($message) use ($user)
        {
            $message->from('donotreply@alantraleasing.com', 'Do not reply');
            $message->to('trevor.sawler@gmail.com')->subject('Contact form from website');
        });

        return Redirect::to('/')->with('message', 'Your message has been delivered');
    }


    public function getAllWebsiteContacts()
    {
        $contacts = Contact::orderBy('full_name')->get();

        return View::make('vcms::admin.contacts-list-all-contacts')
            ->with('page_title', 'Website Contacts')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('contacts', $contacts);
    }


    public function getContactForAdmin()
    {
        $id = Input::get('id');
        $contact = Contact::find($id);

        return View::make('vcms::admin.contacts-show-contact')
            ->with('page_title', 'Website Contacts')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('contact', $contact);

    }

    public function deleteContactForAdmin()
    {
        $id = Input::get('id');
        $contact = Contact::find($id);
        $contact->delete();

        return Redirect::to('/admin/contacts/list-all-website-contacts')
            ->with('message', 'Message deleted');
    }

}
