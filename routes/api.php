<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Products
    Route::post('products/media', 'ProductsApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductsApiController');

    // Discounts
    Route::apiResource('discounts', 'DiscountsApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Taxes
    Route::apiResource('taxes', 'TaxesApiController');

    // Invoices
    Route::apiResource('invoices', 'InvoicesApiController');

    // Customers
    Route::apiResource('customers', 'CustomersApiController');
});
