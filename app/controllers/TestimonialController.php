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

}
