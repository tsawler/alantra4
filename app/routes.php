<?php

/**
 * Show home page
 */
Route::get('/', 'AlantraPageController@showHome');

Route::post('/subscribe', 'SubscriberController@postSubscribe');

/**
 * Change language prefs
 */
Route::get('/changelanguage', 'verilion\vcms\LanguageController@getChangeLanguage');

/**
 * UI
 */
Route::get('/menuUp', 'verilion\vcms\UIController@menuUp');
Route::get('/menuDown', 'verilion\vcms\UIController@menuDown');

/**
 * User login/password routes
 */
Route::get('/admin/login', 'verilion\vcms\LoginController@getLogin');
Route::get('/login', 'verilion\vcms\LoginController@getLogin');
Route::post('/admin/login', 'verilion\vcms\LoginController@postLogin');
Route::controller('/password', 'verilion\vcms\RemindersController');

/**
 * Events (calendar) routes
 */
Route::get('/events/jsonevents', 'verilion\vcms\EventsController@getJsonEvents');
Route::get('/event/{id}/{title?}', 'verilion\vcms\EventsController@showEvent');

/**
 * Gallery routes
 */
Route::get('/gallery/items/{gallery?}', 'verilion\vcms\GalleryController@getAllItems');

/**
 * Blog routes
 */
Route::get('/blog/{blogpage}/{year?}/{month?}', 'verilion\vcms\PostsController@index')
	->where(array('year' => '\d{4}', 'month' => '\d{2}'));
Route::get('/blogs/{blogpage}', 'verilion\vcms\BlogController@getBlog');
Route::get('/blog/post/{post}', 'verilion\vcms\BlogController@getPost');

/**
 * news routes
 */
Route::get('/news/all', 'verilion\vcms\NewsController@index');
Route::get('/news/{slug}', 'verilion\vcms\NewsController@showNews');

/**
 * FAQ routes
 */
Route::get('/faqs', 'verilion\vcms\FaqController@showFaqs');

/**
 * Quote routes
 */
Route::get('/quote', 'QuoteController@getQuote');
Route::post('/quote', 'QuoteController@postQuote');


/**
 * Contact routes
 */
Route::get('/contact', 'ContactController@getContact');
Route::post('/contact', 'ContactController@postContact');

/**
 * Product Routes
 */
//Route::get('/products', 'ProductCategoriesController@allCategories');
//Route::get('/products/{product_category}', 'ProductCategoriesController@getCategoryPublic');
Route::get('/products/{product_name}','ProductsController@getProductPublic');
//Route::get('/products/{product_category}/{product_name}', 'ProductsController@getProductPublic');

/**
 * Testimonial Routes
 */
Route::get('/testimonials', 'TestimonialController@getTestimonialsPage');

/**
 * Admin routes
 */
Route::group(array('before' => 'auth.admin'), function ()
{
	// menus
	Route::group(array('before' => 'auth.admin.menus'), function ()
	{
		Route::get('/menu/menujson', 'verilion\vcms\MenuController@getMenujson');
		Route::get('/menu/ddmenujson', 'verilion\vcms\MenuController@getDdmenujson');
		Route::get('/menu/ddsortitems', 'verilion\vcms\MenuController@getDdsortitems');
		Route::get('/menu/sortitems', 'verilion\vcms\MenuController@getSortitems');
		Route::post('/menu/saveddmenuitem', 'verilion\vcms\MenuController@postSaveddmenuitem');
		Route::post('/menu/savemenuitem', 'verilion\vcms\MenuController@postSavemenuitem');
		Route::post('/menu/deletemenuitem', 'verilion\vcms\MenuController@postDeletemenuitem');
		Route::post('/menu/deleteddmenuitem', 'verilion\vcms\MenuController@postDeleteddmenuitem');
	});

	// website contacts
	Route::group(array('before' => 'auth.admin.contacts'), function ()
	{
		Route::get('/admin/contacts/list-all-website-contacts', 'ContactController@getAllWebsiteContacts');
		Route::get('/admin/contacts/contact', 'ContactController@getContactForAdmin');
		Route::get('/admin/contacts/deletecontact', 'ContactController@deleteContactForAdmin');
	});

	// website quote requests
	Route::group(array('before' => 'auth.admin.quotes'), function ()
	{
		Route::get('/admin/quotes/all-quotes', 'QuoteController@getAllQuotes');
		Route::get('/admin/quotes/quote', 'QuoteController@getQuoteForAdmin');
		Route::get('/admin/quotes/deletequote', 'QuoteController@deleteQuoteForAdmin');
	});

	// products
	Route::group(array('before' => 'auth.admin.products'), function ()
	{
		Route::get('/admin/products/all-products', 'ProductsController@getAllProducts');
		Route::get('/admin/products/product', 'ProductsController@getEditproduct');
		Route::post('/admin/products/product', 'ProductsController@postEditproduct');
		Route::get('/admin/products/deleteproduct', 'ProductsController@getDeleteproduct');
		Route::get('/admin/products/deleteproductimage', 'ProductsController@getDeleteProductImage');
		Route::get('/admin/products/deleteproductdrawing', 'ProductsController@getDeleteProductDrawing');
	});

	// product categories
	Route::group(array('before' => 'auth.admin.product-categories'), function ()
	{
		Route::get('/admin/product-categories/all-product-categories', 'ProductCategoriesController@getAllProductCategories');
		Route::get('/admin/product-categories/category', 'ProductCategoriesController@getEditCategory');
		Route::post('/admin/product-categories/category', 'ProductCategoriesController@postEditCategory');
		Route::get('/admin/product-categories/deletecategory', 'ProductCategoriesController@getDeleteCategory');
	});

	// testimonials
	Route::group(array('before' => 'auth.admin.testimonials'), function ()
	{
		Route::get('/admin/testimonials/all-testimonials', 'TestimonialController@getAllTestimonials');
		Route::get('/admin/testimonials/testimonial', 'TestimonialController@getEditTestimonial');
		Route::post('/admin/testimonials/testimonial', 'TestimonialController@postEditTestimonial');
		Route::get('/admin/testimonials/deletetestimonial', 'TestimonialController@getDeleteTestimonial');
	});


	// pages
	Route::group(array('before' => 'auth.admin.pages'), function ()
	{
		Route::post('/page/savepage', 'AlantraPageController@savePage');
		Route::get('/admin/page/all-pages', 'AlantraPageController@getAllPages');
		Route::get('/admin/page/page', 'AlantraPageController@getEditpage');
		Route::post('/admin/page/page', 'AlantraPageController@postEditpage');
		Route::get('/admin/page/deletepage', 'AlantraPageController@getDeletePage');
		Route::post('/page/savefragment', 'AlantraPageController@postSavefragment');
		Route::get('/admin/page/deletepageimage', 'AlantraPageController@getDeletePageImage');
	});

	// calendar
	Route::group(array('before' => 'auth.admin.events'), function ()
	{
		Route::get('/events/movedate', 'verilion\vcms\EventsController@getMoveDate');
		Route::get('/events/moveenddates', 'verilion\vcms\EventsController@getMoveEndDate');
		Route::post('/events/save_event', 'verilion\vcms\EventsController@postSaveEvent');
		Route::get('/events/retrieve_event', 'verilion\vcms\EventsController@retrieveEvent');
		Route::get('/events/delete_event', 'verilion\vcms\EventsController@deleteEvent');
		Route::get('/admin/calendar', 'verilion\vcms\EventsController@showCalForAdmin');
	});

	// blog
	Route::group(array('before' => 'auth.admin.blogs'), function ()
	{
		Route::post('/admin/post/editinplace', 'verilion\vcms\PostsController@postEditInPlace');
		Route::get('/admin/blogs/all-blogs', 'verilion\vcms\BlogController@getAllBlogs');
		Route::get('/admin/blogs/blog', 'verilion\vcms\BlogController@getEditBlog');
		Route::post('/admin/blogs/blog', 'verilion\vcms\BlogController@postEditBlog');
		Route::get('/admin/blogs/deleteblog', 'verilion\vcms\BlogController@getDeleteBlog');
		Route::get('/admin/blogs/post', 'verilion\vcms\BlogController@getEditPost');
		Route::post('/admin/blogs/post', 'verilion\vcms\BlogController@postEditPost');
		Route::get('/admin/blogs/deletepost', 'verilion\vcms\PostsController@getDeletePost');
		Route::get('/admin/blogs/posts', 'verilion\vcms\PostsController@getAllPosts');
	});

	// gallery
	Route::group(array('before' => 'auth.admin.galleries'), function ()
	{
		Route::get('/admin/galleries/all-galleries', 'verilion\vcms\GalleryController@getAllGalleries');
		Route::get('/admin/galleries/gallery', 'verilion\vcms\GalleryController@getEditGallery');
		Route::post('/admin/galleries/gallery', 'verilion\vcms\GalleryController@postEditGallery');
		Route::get('/admin/galleries/deletegallery', 'verilion\vcms\GalleryController@getDeleteGallery');
		Route::post('/admin/galleries/save-gallery-item', 'verilion\vcms\GalleryController@postSaveItem');
		Route::get('/admin/galleries/deleteitem', 'verilion\vcms\GalleryController@getDeleteItem');
		Route::get('/admin/galleries/retrieve_item', 'verilion\vcms\GalleryController@getRetrieveItem');
	});

	// users
	Route::group(array('before' => 'auth.admin.users'), function ()
	{
		Route::get('admin/users/all-users', 'verilion\vcms\UserController@getAllUsers');
		Route::get('admin/users/user', 'verilion\vcms\UserController@getEditUser');
		Route::post('admin/users/user', 'verilion\vcms\UserController@postEditUser');
		Route::post('admin/users/editroles', 'verilion\vcms\UserController@postEditUserRoles');
		Route::get('admin/users/deleteuser', 'verilion\vcms\UserController@getDeleteUser');
	});

	// news
	Route::group(array('before' => 'auth.admin.news'), function()
	{
		Route::post('/news/savenews', 'verilion\vcms\NewsController@saveNews');
		Route::get('/admin/news/all-newsitems', 'verilion\vcms\NewsController@getAllNews');
		Route::get('/admin/news/newsitem', 'verilion\vcms\NewsController@getEditnews');
		Route::post('/admin/news/newsitem', 'verilion\vcms\NewsController@postEditnews');
		Route::get('/admin/news/deletenews', 'verilion\vcms\NewsController@getDeleteNews');
	});

	// faqs
	Route::group(array('before' => 'auth.admin.faqs'), function()
	{
		Route::get('/admin/faqs/all-faqs', 'verilion\vcms\FaqController@getAllFaqs');
		Route::get('/admin/faqs/faq', 'verilion\vcms\FaqController@editFaq');
		Route::post('/admin/faqs/faq', 'verilion\vcms\FaqController@postEditFaq');
		Route::get('/admin/faqs/deletefaq', 'verilion\vcms\FaqController@deleteFaq');
	});

	// logout
	Route::get('/admin/logout', 'verilion\vcms\LoginController@getLogout');

	// admin dashboard
	Route::get('/admin/dashboard', 'AlantraAdminController@getDashboard');

	// profile
	Route::get('/admin/users/profile', 'verilion\vcms\ProfileController@getProfile');
	Route::post('/admin/users/profile', 'verilion\vcms\ProfileController@postProfile');
	Route::post('/admin/users/prefs/{id?}', 'verilion\vcms\ProfileController@postPrefs');

	// error pages
	Route::get('/admin/unauthorized', 'verilion\vcms\AdminController@get403');

});

/**
 * Search Routes
 */
Route::post('/search', 'verilion\vcms\SearchController@performSearch');

/**
 * sitemap
 */
Route::get('sitemap.xml', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // add items to the sitemap (url, date, priority, freq)
    $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('//products/coming-soon-new-products-2015'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/products/wash-cars'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/products/mining-trailers'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/products/storage-units'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/products/custom-trailersmodular-buildings'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/products/bunkhouses'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/products/clearanace'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/products/officelunchroom'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

    // get all pages from db
    $pages = DB::table('pages')->orderBy('created_at', 'desc')->get();

    // add every page to the sitemap
    foreach ($pages as $page)
    {
        $sitemap->add(URL::to('/'.$page->slug), $page->updated_at, '0.9', 'weekly');
    }

    // generate your sitemap (format, filename)
    //$sitemap->store('xml', 'mysitemap');
    // this will generate file mysitemap.xml to your public folder
    return $sitemap->render('xml');
});

/**
 * Page Routes
 */
Route::get('/alternate/{pagename}', 'AlantraPageController@showPageNoBanner');
Route::get('/{pagename?}', 'AlantraPageController@showPage');

/**
 * Catch all
 */
Route::any('{path?}', function ($path)
{
    return Redirect::to('/not-active');
})->where('path', '.+');
