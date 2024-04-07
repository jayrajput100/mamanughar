<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
/*$routes->setDefaultController('Admin');
$routes->setDefaultMethod('index');*/
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


//Front side routes

$routes->get('/',               'frontend\Home::home');
$routes->get('/home',               'frontend\Home::home');
$routes->get('home/get_autocomplete', 'frontend\Home::get_autocomplete');
$routes->post('home/search_result', 'frontend\Home::search_result');
$routes->get('home/search_result', 'frontend\Home::search_result');
$routes->get('/logout',               'frontend\SignUp::logout');
$routes->get('/signup',         'frontend\SignUp::signup');

$routes->get('/profile',            'frontend\MyProfile::profile');
$routes->match(['get', 'post'],       'up_profile', 'frontend\MyProfile::updateProfile');

/*$routes->get('/loadCategory',         'frontend\loadCategory::loadCategory');*/

$routes->match(['get', 'post'], 'forgot', 'frontend\SignUp::forgot');
$routes->match(['get', 'post'], 'forgotemail', 'frontend\SignUp::forgotemail');
$routes->match(['get', 'post'], 'newpass', 'frontend\SignUp::newpass');
$routes->match(['get', 'post'], 'updatepass', 'frontend\SignUp::updatepass');

$routes->match(['get', 'post'], 'signin', 'frontend\SignUp::signin');
$routes->match(['get', 'post'], 'about', 'frontend\Home::about');
$routes->match(['get', 'post'], 'allcategory', 'frontend\Category::allcategory');
$routes->match(['get', 'post'], 'all_particular_category/(:num)', 'frontend\Category::all_particular_category');
$routes->match(['get', 'post'], 'particular_third_sub_cat/(:num)', 'frontend\Category::particular_third_sub_cat');
$routes->match(['get', 'post'], '/sl_signin', 'frontend\SignUp::sl_signin');
//  New Routes
$routes->match(['get', 'post'], 'next_step_supplier/(:any)', 'frontend\Home::next_step_supplier');
$routes->match(['get', 'post'], 'next_step_third_supplier/(:any)', 'frontend\Home::next_step_third_supplier');
$routes->match(['get', 'post'], 'home/filter_code', 'frontend\Home::filter_code');
$routes->match(['get', 'post'], 'home/filter_third_sub_cat', 'frontend\Home::filter_third_sub_cat');
$routes->match(['get', 'post'], 'home/filter_institute', 'frontend\Home::filter_institute');
$routes->match(['get', 'post'], '/faq', 'frontend\Home::faq');
$routes->get('/all_exhibition',         'frontend\Home::all_exhibition');
$routes->match(['get', 'post'], '/all_advertisement', 'frontend\Home::all_advertisement');
$routes->post('profile/sendusermail',         'frontend\MyProfile::sendusermail');


$routes->get('/suppliersignup',         'frontend\SignUp::suppliersignup');

$routes->match(['get'], 'product/view_product/(:num)', 'frontend\Home::view_product');
$routes->match(['get'], 'supplier/view_supplier/(:num)', 'frontend\Home::view_supplier',['filter'=>'uauth']);
$routes->match(['get'], 'institute/view_institute/(:num)', 'frontend\Home::view_institute');

$routes->match(['get','post'], 'view_sub_category/(:num)', 'frontend\Category::view_sub_category');
$routes->match(['get','post'], 'view_third_sub_category/(:num)', 'frontend\Category::view_third_sub_category');


$routes->match(['get', 'post'], 'dosignup', 'frontend\SignUp::dosignup');
$routes->match(['get', 'post'], 'dologin', 'frontend\SignUp::dologin');
$routes->match(['get', 'post'], 'dosuppliersignup', 'frontend\SignUp::dosuppliersignup');

$routes->match(['get', 'post'], 'send_txn_sms', 'frontend\SignUp::send_txn_sms');
$routes->match(['get', 'post'], 'emailtosupplier', 'frontend\SignUp::emailtosupplier');


$routes->match(['get', 'post'], '/verifyotp', 'frontend\SignUp::verifyotp');
$routes->match(['get', 'post'], '/verifysupplierotp', 'frontend\SignUp::verifysupplierotp');

$routes->match(['get'], 'category/subcategory/(:num)', 'frontend\Category::CategoryWise');
/*$routes->get('/otp',         'frontend\SignUp::otp');*/
$routes->match(['get', 'post'], '/otp', 'frontend\SignUp::otp');
$routes->match(['get', 'post'], '/supplierotp', 'frontend\SignUp::supplierotp');


$routes->get('category', 'frontend\Category::allsubcategory');

$routes->match(['get', 'post'], 'front/exhibition/(:num)', 'frontend\Home::view_exhibition');

$routes->match(['get', 'post'], 'front/advertisment/(:num)', 'frontend\Home::view_advertisment');
$routes->match(['get', 'post'], 'test/(:num)', 'frontend\Home::test');
$routes->match(['get', 'post'], 'educational/(:any)', 'frontend\Home::educational');

$routes->match(['get', 'post'], 'signup/resend_otp', 'frontend\SignUp::resend_otp');
$routes->match(['get', 'post'], 'signup/resend_supplier_otp', 'frontend\SignUp::resend_supplier_otp');
$routes->post('/sendmail',         'frontend\SignUp::sendmail');

$routes->match(['get', 'post'], '/email/(:any)', 'frontend\SignUp::email_verify');
$routes->match(['get', 'post'], '/email_user_link/(:any)', 'frontend\SignUp::email_user_verify');




//$routes->get('/', 'backend\Admin::login');
/*$routes->get('/demo', 'backend\Admin::save_data');*/

$routes->match(['get', 'post'],'/admin', 'backend\Admin::login');
/*$routes->get('/login',                'backend\Admin::login');*/
$routes->post('admin/login_code',     'backend\Admin::login_code');
$routes->post('admin/update_profile', 'backend\Admin::update_profile');
$routes->match(['get', 'post'],'admin/testmail', 'backend\Admin::testmail');
$routes->match(['get', 'post'],'admin/getthirdsubcategory', 'backend\Admin::getthirdsubcategory');
$routes->match(['post','get'],  'admin/chgpass','backend\Admin::chgpass',['filter'=>'auth']);

$routes->get('admin/logout',               'backend\Admin::logout',['filter'=>'auth']);

$routes->get('/dashboard',            'backend\Admin::index',['filter'=>'auth']);
$routes->post('/dashboard',            'backend\Admin::index',['filter'=>'auth']);

$routes->get('/profile',              'backend\Admin::profile',['filter'=>'auth']);
$routes->get('faq/add',               'backend\Faq::add',['filter'=>'auth']);
$routes->get('faq/list',              'backend\Faq::list',['filter'=>'auth']);
$routes->get('user/add',              'backend\User::add',['filter'=>'auth']);
$routes->get('user/list',             'backend\User::list',['filters'=>'auth']);
$routes->get('supplier/add',          'backend\Supplier::add',['filter'=>'auth']);
$routes->get('supplier/list',         'backend\Supplier::list',['filter'=>'auth']);
$routes->match(['get', 'post'], 'category/fetch_category','backend\Category::fetch_category');
// Category Route
$routes->match(['get', 'post'], 'popupcategory/add',  'backend\Category::add',['filter'=>'auth']);
$routes->match(['get', 'post'], 'popupcategory/subadd',  'backend\Subcategory::add',['filter'=>'auth']);
$routes->match(['get', 'post'], 'popupcategory/thirdsubadd',  'backend\Third_Subcategory::add',['filter'=>'auth']);


// Country Route
$routes->match(['get', 'post'], 'country/add',    'backend\Country::add',['filter'=>'auth']);
$routes->match(['get', 'post'], 'country/list',   'backend\Country::list',['filter'=>'auth']);
$routes->match(['post'],        'country/view',   'backend\Country::view',['filter'=>'auth']);
$routes->match(['post'],        'country/edit',   'backend\Country::edit',['filter'=>'auth']);
$routes->match(['post'],        'country/update', 'backend\Country::update',['filter'=>'auth']);

// State Route
$routes->match(['get', 'post'], 'state/add',    'backend\State::add',['filter'=>'auth']);
$routes->match(['get', 'post'], 'state/list',   'backend\State::list',['filter'=>'auth']);
$routes->match(['post'],        'state/view',   'backend\State::view',['filter'=>'auth']);
$routes->match(['post'],        'state/edit',   'backend\State::edit',['filter'=>'auth']);
$routes->match(['post'],        'state/update', 'backend\State::update',['filter'=>'auth']);

// State Route
$routes->match(['get', 'post'], 'city/add',    'backend\City::add',['filter'=>'auth']);
$routes->match(['get', 'post'], 'city/list',   'backend\City::list',['filter'=>'auth']);
$routes->match(['post'],        'city/view',   'backend\City::view',['filter'=>'auth']);
$routes->match(['post'],        'city/edit',   'backend\City::edit',['filter'=>'auth']);
$routes->match(['post'],        'city/update', 'backend\City::update',['filter'=>'auth']);

// Category Route
$routes->match(['get', 'post'], 'category/add',    'backend\Category::add',['filter'=>'auth']);
$routes->match(['get', 'post'], 'category/list',   'backend\Category::list',['filter'=>'auth']);
$routes->match(['post'],        'category/view',   'backend\Category::view',['filter'=>'auth']);
$routes->match(['post'],        'category/edit',   'backend\Category::edit',['filter'=>'auth']);
$routes->match(['post'],        'category/update', 'backend\Category::update',['filter'=>'auth']);

// Sub Category Route
$routes->match(['get', 'post'], 'subcategory/add',   'backend\Subcategory::add',['filter'=>'auth']);
$routes->match(['get', 'post'], 'subcategory/list',  'backend\Subcategory::list',['filter'=>'auth']);
$routes->match(['post'],        'subcategory/view',  'backend\Subcategory::view',['filter'=>'auth']);
$routes->match(['post'],        'subcategory/edit',  'backend\Subcategory::edit',['filter'=>'auth']);
$routes->match(['post'],        'subcategory/update','backend\Subcategory::update',['filter'=>'auth']);

//Third Sub Category Route
$routes->match(['get', 'post'], 'third_subcategory/add',   'backend\Third_Subcategory::add',['filter'=>'auth']);
$routes->match(['get', 'post'], 'third_subcategory/list',  'backend\Third_Subcategory::list',['filter'=>'auth']);
$routes->match(['post'],        'third_subcategory/view',  'backend\Third_Subcategory::view',['filter'=>'auth']);
$routes->match(['post'],        'third_subcategory/edit',  'backend\Third_Subcategory::edit',['filter'=>'auth']);
$routes->match(['post'],        'third_subcategory/update','backend\Third_Subcategory::update',['filter'=>'auth']);

// Supplier Route
$routes->match(['get', 'post'], 'supplier/add',    'backend\Supplier::add',   ['filter'=>'auth']);
$routes->match(['get', 'post'], 'supplier/list',   'backend\Supplier::list',  ['filter'=>'auth']);
$routes->match(['post'],        'supplier/view',   'backend\Supplier::view',  ['filter'=>'auth']);
$routes->match(['post'],        'supplier/edit',   'backend\Supplier::edit',  ['filter'=>'auth']);
$routes->match(['post'],        'supplier/update', 'backend\Supplier::update',['filter'=>'auth']);

// Faq Route
$routes->match(['get', 'post'], 'faq/add',    'backend\Faq::add',   ['filter'=>'auth']);
$routes->match(['get', 'post'], 'faq/list',   'backend\Faq::list',  ['filter'=>'auth']);
$routes->match(['post'],        'faq/view',   'backend\Faq::view',  ['filter'=>'auth']);
$routes->match(['post'],        'faq/edit',   'backend\Faq::edit',  ['filter'=>'auth']);
$routes->match(['post'],        'faq/update', 'backend\Faq::update',['filter'=>'auth']);

// Institute  Route
$routes->match(['get', 'post'], 'institute/add',    'backend\Institute::add',   ['filter'=>'auth']);
$routes->match(['get', 'post'], 'institute/list',   'backend\Institute::list',  ['filter'=>'auth']);
$routes->match(['post'],        'institute/view',   'backend\Institute::view',  ['filter'=>'auth']);
$routes->match(['post'],        'institute/edit',   'backend\Institute::edit',  ['filter'=>'auth']);
$routes->match(['post'],        'institute/update', 'backend\Institute::update',['filter'=>'auth']);

// Advertisment Route
$routes->match(['get', 'post'], 'advertisment/add',    'backend\Advertisment::add',   ['filter'=>'auth']);
$routes->match(['get', 'post'], 'advertisment/list',   'backend\Advertisment::list',  ['filter'=>'auth']);
$routes->match(['post'],        'advertisment/view',   'backend\Advertisment::view',  ['filter'=>'auth']);
$routes->match(['post'],        'advertisment/edit',   'backend\Advertisment::edit',  ['filter'=>'auth']);
$routes->match(['post'],        'advertisment/update', 'backend\Advertisment::update',['filter'=>'auth']);

// user Route
$routes->match(['get', 'post'], 'user/add',    'backend\User::add',   ['filter'=>'auth']);
$routes->match(['get', 'post'], 'user/list',   'backend\User::list',  ['filter'=>'auth']);
$routes->match(['post'],        'user/view',   'backend\User::view',  ['filter'=>'auth']);
$routes->match(['post'],        'user/edit',   'backend\User::edit',  ['filter'=>'auth']);
$routes->match(['post'],        'user/update', 'backend\User::update',['filter'=>'auth']);
$routes->match(['get','post'],        'user/live',   'backend\User::live',['filter'=>'auth']);


$routes->match(['post'], 'admin/delete', 'backend\Admin::delete',['filter'=>'auth']);
$routes->match(['post'], 'admin/change_status', 'backend\Admin::change_status',['filter'=>'auth']);

$routes->match(['post'], 'third_subcategory/getcategory', 'backend\Third_Subcategory::getcategory',['filter'=>'auth']);
$routes->match(['post'], 'third_subcategory/getsubcategory', 'backend\Third_Subcategory::getsubcategory');
$routes->match(['post'], 'third_subcategory/getsubcategory1', 'backend\Third_Subcategory::getsubcategory1',['filter'=>'auth']);
$routes->match(['post'], 'faq/getthirdsubcategory', 'backend\Faq::getthirdsubcategory');

$routes->match(['post'], 'city/getstate', 'backend\City::getstate');
$routes->match(['post'], 'city/getcity',  'backend\City::getcity');


$routes->match(['post','get'], 'popupcategory/popadd', 'backend\Category::popadd',['filter'=>'auth']);

$routes->match(['get'], 'notification/viewproduct/(:num)', 'backend\Admin::viewproduct',['filter'=>'auth']);
$routes->match(['post','get'], 'admin/listproduct', 'backend\Admin::listproduct',['filter'=>'auth']);

/*$routes->get('category/add', 'backend\Category::add',['filter'=>'auth']);
$routes->get('category/list', 'backend\Category::list',['filter'=>'auth']);*/
/*$routes->get('demo/list', 'backend\Demo::list',['filter'=>'auth']);
$routes->post('demo/list', 'backend\Demo::list',['filter'=>'auth']);
$routes->get('demo/add', 'backend\Demo::add',['filter'=>'auth']);
$routes->post('demo/add', 'backend\Demo::add',['filter'=>'auth']);*/

// Exhibition  Route
$routes->match(['get', 'post'], 'exhibition/add',    'backend\Exhibition::add',   ['filter'=>'auth']);
$routes->match(['get', 'post'], 'exhibition/list',   'backend\Exhibition::list',  ['filter'=>'auth']);
$routes->match(['post'],        'exhibition/view',   'backend\Exhibition::view',  ['filter'=>'auth']);
$routes->match(['post'],        'exhibition/edit',   'backend\Exhibition::edit',  ['filter'=>'auth']);
$routes->match(['post'],        'exhibition/update', 'backend\Exhibition::update',['filter'=>'auth']);

//Test
$routes->match(['get', 'post'], 'test/add',    'backend\Test::add',   ['filter'=>'auth']);
$routes->match(['get', 'post'], 'test/list',   'backend\Test::list',  ['filter'=>'auth']);
$routes->match(['post'],        'test/view',   'backend\Test::view',  ['filter'=>'auth']);
$routes->match(['post'],        'test/edit',   'backend\Test::edit',  ['filter'=>'auth']);
$routes->match(['post'],        'test/update', 'backend\Test::update',['filter'=>'auth']);
$routes->match(['post','get'],  'test/fetch_test','backend\Test::fetch_test',['filter'=>'auth']);

$routes->match(['get', 'post'], 'innovaction/add',    'backend\Innovaction::add',   ['filter'=>'auth']);
$routes->match(['get', 'post'], 'innovaction/list',   'backend\Innovaction::list',  ['filter'=>'auth']);
$routes->match(['post'],        'innovaction/view',   'backend\Innovaction::view',  ['filter'=>'auth']);
$routes->match(['post'],        'innovaction/edit',   'backend\Innovaction::edit',  ['filter'=>'auth']);
$routes->match(['post'],        'innovaction/update', 'backend\Innovaction::update',['filter'=>'auth']);

// Supplier Login \

$routes->match(['get', 'post'],'sl/','backend\SignUp::sl_signin');
$routes->match(['get', 'post'],'sl/login','backend\SignUp::sl_signin');
$routes->match(['get', 'post'],'sl/profile_update','backend\Sl::profile_update');



$routes->post('sl/login_code','backend\Sl::login_code');
$routes->get('sl/dashboard','backend\Sl::index',['filter'=>'slauth']);
$routes->match(['post'], 'sl/getsubcategory', 'backend\Sl::getsubcategory',['filter'=>'slauth']);
$routes->match(['post'], 'sl/getthirdsubcategory', 'backend\Sl::getthirdsubcategory',['filter'=>'slauth']);
$routes->match(['get','post'], 'sl/profile', 'backend\Sl::profile',['filter'=>'slauth']);
$routes->match(['get','post'], 'sl/update_profile', 'backend\Sl::update_profile',['filter'=>'slauth']);
$routes->match(['get', 'post'], 'product/add',    'backend\Product::add',   ['filter'=>'slauth']);
$routes->match(['get', 'post'], 'product/list',   'backend\Product::list',  ['filter'=>'slauth']);
$routes->match(['post'],        'product/view',   'backend\Product::view',  ['filter'=>'slauth']);
$routes->match(['post'],        'product/edit',   'backend\Product::edit',  ['filter'=>'slauth']);
$routes->match(['post'],        'product/update', 'backend\Product::update',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/logout','backend\Sl::logout',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/addinnovaction','backend\Sl::addinnovaction',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/chgpass','backend\Sl::chgpass',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/gallery/add','backend\Gallery::add',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/gallery/list','backend\Gallery::list',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/gallery/view','backend\Gallery::view',['filter'=>'slauth']);
$routes->match(['get','post'], 'sl/upload', 'backend\Sl::upload',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/gallery/fetch_images','backend\Gallery::fetch_images',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/gallery/delete_file','backend\Gallery::delete_file',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/catalog/add','backend\Catalog::add',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/catalog/list','backend\Catalog::list',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/catalog/view','backend\Catalog::view',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/catalog/fetch_files','backend\Catalog::fetch_files',['filter'=>'slauth']);
$routes->match(['post','get'],  'sl/catalog/delete_file','backend\Catalog::delete_file',['filter'=>'slauth']);
$routes->match(['post','get'],  '/search_data/(:any)','frontend\Search::search_data');
$routes->match(['post','get'],  '/contact','frontend\Home::contact');


$routes->match(['get', 'post'],'gallery/change_status', 'backend\Gallery::change_status');
$routes->match(['get', 'post'],'catalog/change_status', 'backend\Catalog::change_status');



$routes->match(['get', 'post'], 'signup/resend_sms', 'frontend\SignUp::resend_sms');
$routes->match(['get', 'post'], 'signup/resend_sms_supplier', 'frontend\SignUp::resend_sms_supplier');
$routes->match(['get','post'], 'gallery/viewsupplier/(:num)', 'backend\Gallery::viewsupplier');
$routes->match(['get','post'], 'gallery/viewsuppliercatalog/(:num)', 'backend\Gallery::viewsuppliercatalog');
$routes->match(['get','post'], 'sl/verify_email', 'backend\Sl::verify_email',['filter'=>'slauth']);


// Profile Routing


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
