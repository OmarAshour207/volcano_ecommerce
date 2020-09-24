<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@HomePage');
Route::get('/about', 'HomeController@aboutPage');

Route::get('/contact-us', 'HomeController@contact');
Route::post('/send/contact', 'ContactController@sendContact')->name('send.contact');

Route::get('/services', 'HomeController@servicesPage');
Route::get('/services/{id}/{title}', 'HomeController@singleService')->name('service.show');

Route::get('/blogs', 'HomeController@blogsPage');
Route::get('/blogs/{id}/{title}', 'HomeController@showBlog')->name('blog.show');

Route::post('subscribe', 'SubscriberController@send')->name('send.subscriber');

Route::get('products', 'ProductController@showProducts');
Route::get('product/{id}/{title}', 'ProductController@showProduct')->name('product.show');

Route::get('category/{id}/{title}', 'HomeController@categoryProducts')->name('category.products');

// Admin ROUTES
Auth::routes(['register' => false]);


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'] , function () {

    Route::get('dashboard', 'AdminController@showDashboard');

    Route::resource('slider', 'SliderController');

    Route::resource('services', 'ServiceController');

    Route::resource('contacts', 'ContactController');

    Route::resource('about', 'AboutUsController');

    Route::resource('testimonials', 'TestimonialController');

    Route::resource('team-members', 'TeamMemberController');

    Route::resource('blogs', 'BlogController');

    Route::resource('contactus', 'ContactUsController');

    Route::resource('categories', 'CategoryController');

    Route::resource('offers', 'OfferController');

    Route::resource('subscribers', 'SubscribeController');

    Route::resource('products', 'ProductController');
    Route::post('product/upload/image', 'ImageController@uploadProductImage')->name('upload.product.image');
    Route::post('product/remove/image', 'ImageController@removeProductImage')->name('remove.product.image');



    Route::get('settings/contact-info', 'ContactInfoController@contactInfo')->name('settings.contact');
    Route::post('settings/contact-info', 'ContactInfoController@store')->name('settings.contact.store');

    Route::get('settings/seo', 'SeoController@showSeoPage')->name('settings.seo');
    Route::post('settings/seo', 'SeoController@store')->name('settings.seo.store');

    Route::get('settings/analytics', 'AnalyticsController@showPage')->name('settings.analytics');
    Route::post('settings/analytics', 'AnalyticsController@store')->name('settings.analytics');

    Route::resource('website-settings', 'SettingController');

    Route::resource('logos', 'LogoController');

    Route::post('upload/image', 'ImageController@uploadPhoto')->name('upload.image');
    Route::post('remove/image', 'ImageController@removePhoto')->name('remove.image');

    Route::get('profile/edit', 'ProfileController@edit')->name('edit.profile');
    Route::post('profile/edit', 'ProfileController@update')->name('update.profile');

    Route::get('clear/notifications', 'NotificationController@clearAll')->name('clear.notifications');
    Route::get('view/notifications', 'NotificationController@viewAll')->name('view.notifications');
});
