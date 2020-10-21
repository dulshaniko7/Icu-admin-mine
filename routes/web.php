<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();


Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});



// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductsController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductsController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductsController');

    // Discounts
    Route::delete('discounts/destroy', 'DiscountsController@massDestroy')->name('discounts.massDestroy');
    Route::resource('discounts', 'DiscountsController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Taxes
    Route::delete('taxes/destroy', 'TaxesController@massDestroy')->name('taxes.massDestroy');
    Route::resource('taxes', 'TaxesController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::resource('invoices', 'InvoicesController');

    // Customers
    Route::delete('customers/destroy', 'CustomersController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    //user routes
   // Route::get('/home', 'HomeController@index')->name('home');
   // Route::get('/shopping/home',)
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});




Route::group(['prefix' => 'shop', 'as' => 'user.', 'namespace' => 'Shop', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('cart.add');
    Route::get('/shopping-cart', 'ProductController@getCart')->name('cart');
    Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');
    Route::post('/payment-initiate-request', 'ProductController@initiate')->name('init');
    Route::post('/payment-complete', 'ProductController@payment')->name('payment');

});


Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function () {
    Route::get('/profile', 'HomeController@getProfile')->name('profile');

});

/*

Route::group([ 'as' => 'user.', 'namespace' => 'Client', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('cart.add');
    Route::get('/shopping-cart', 'ProductController@getCart')->name('cart');
    Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');
});

*/
