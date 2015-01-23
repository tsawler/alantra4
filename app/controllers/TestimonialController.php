<?php

class TestimonialController extends BaseController {

    /**
     * List all testimonials
     *
     * @return mixed
     */
    public function getAllTestimonials()
    {
        $testimonials = Testimonial::orderby('company')->get();

        return View::make('vcms::admin.testimonials-list-all')
            ->with('testimonials', $testimonials)
            ->with('page_name', '');
    }



    /**
     * @return mixed
     */
    public function getEditTestimonial()
    {
        if (Input::get('id') > 0)
        {
            $testimonial = Testimonial::find(Input::get('id'));
        } else
        {
            $testimonial = new Testimonial;
        }

        return View::make('vcms::admin.testimonials-edit-testimonial')
            ->with('testimonial_id', Input::get('id'))
            ->with('testimonial', $testimonial);
    }



    /**
     * @return mixed
     */
    public function postEditTestimonial()
    {
        $id = Input::get('testimonial_id');

        if ($id > 0)
        {
            $testimonial = Testimonial::find($id);
        } else
        {
            $testimonial = new Testimonial;
        }

        $testimonial->person = Input::get('person');
        $testimonial->company = Input::get('company');
        $testimonial->testimonial = Input::get('testimonial');
        $testimonial->testimonial_fr = Input::get('testimonial_fr');
        $testimonial->testimonial_date = Input::get('testimonial_date');

        $testimonial->save();

        return Redirect::to('/admin/testimonials/all-testimonials');
    }


    /**
     * @return mixed
     */
    public function getDeleteTestimonial()
    {
        $testimonial = Testimonial::find(Input::get('id'));
        $testimonial->delete();
        return Redirect::to('/admin/testimonials/all-testimonials');
    }

}
