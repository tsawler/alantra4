<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Show home page
 */
Route::get('/', 'verilion\vcms\PageController@showHome');

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
Route::get('/products', 'ProductsController@allProducts');


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

	// products
	Route::group(array('before' => 'auth.admin.products'), function ()
	{
		Route::get('/admin/products/all-products', 'ProductsController@getAllProducts');
		Route::get('/admin/products/product', 'ProductsController@getEditproduct');
		Route::post('/admin/products/product', 'ProductsController@postEditproduct');
		Route::get('/admin/products/deleteproduct', 'ProductsController@getDeleteproduct');
		Route::get('/admin/products/deleteproductimage', 'ProductsController@getDeleteProductImage');
	});

	// product categories
	Route::group(array('before' => 'auth.admin.product-categories'), function ()
	{
		Route::get('/admin/product-categories/all-product-categories', 'ProductCategoriesController@getAllProductCategories');
		Route::get('/admin/product-categories/category', 'ProductCategoriesController@getEditCategory');
		Route::post('/admin/product-categories/category', 'ProductCategoriesController@postEditCategory');
		Route::get('/admin/product-categories/deletecategory', 'ProductCategoriesController@getDeleteCategory');
	});


	// pages
	Route::group(array('before' => 'auth.admin.pages'), function ()
	{
		Route::post('/page/savepage', 'verilion\vcms\PageController@savePage');
		Route::get('/admin/page/all-pages', 'verilion\vcms\PageController@getAllPages');
		Route::get('/admin/page/page', 'verilion\vcms\PageController@getEditpage');
		Route::post('/admin/page/page', 'verilion\vcms\PageController@postEditpage');
		Route::get('/admin/page/deletepage', 'verilion\vcms\PageController@getDeletePage');
	});

	// calendar
	Route::group(array('before' => 'auth.admin.calendars'), function ()
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
	Route::get('/admin/dashboard', 'verilion\vcms\AdminController@getDashboard');

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
 * Page Routes
 */
Route::get('/{pagename?}', 'verilion\vcms\PageController@showPage');
