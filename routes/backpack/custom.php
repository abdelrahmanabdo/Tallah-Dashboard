<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', ''),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('blog', 'BlogCrudController');
    Route::crud('blog/under-review', 'BlogNeedReviewCrudController');
    Route::crud('brand', 'BrandCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('color', 'ColorCrudController');
    Route::crud('country', 'CountryCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('blog/comments', 'BlogCommentCrudController');
    Route::crud('blog/reviews', 'BlogReviewCrudController');
    Route::crud('blog/images', 'BlogImageCrudController');
    Route::crud('closet', 'ClosetCrudController');
    Route::crud('closetoutfititem', 'ClosetOutfitItemCrudController');
    Route::crud('gift', 'GiftCrudController');
    Route::crud('outfit', 'OutfitCrudController');
    Route::crud('registrationchoice', 'RegistrationChoiceCrudController');
    Route::crud('specialization', 'SpecializationCrudController');
    Route::crud('stylist', 'StylistCrudController');
    Route::crud('stylistbankaccount', 'StylistBankAccountCrudController');
    Route::crud('stylistcertificate', 'StylistCertificateCrudController');
    Route::crud('stylistproject', 'StylistProjectCrudController');
    Route::crud('stylistprojectimage', 'StylistProjectImageCrudController');
    Route::crud('stylistspecialization', 'StylistSpecializationCrudController');
    Route::crud('support', 'SupportCrudController');
    Route::crud('userprofile', 'UserProfileCrudController');
    Route::crud('userrole', 'UserRoleCrudController');
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');
    Route::get('charts/weekly-stylists', 'Charts\WeeklyStylistsChartController@response')->name('charts.weekly-stylists.index');
    Route::crud('about', 'AboutUsCrudController');
    Route::crud('TAndC', 'TAndCCrudController');
    Route::crud('devicetoken', 'DeviceTokenCrudController');
    Route::crud('favourite', 'FavouriteCrudController');
    Route::crud('otp', 'OTPCrudController');
    Route::crud('settings', 'SettingsCrudController');
    Route::crud('chat', 'ChatCrudController');
    Route::crud('subscription', 'SubscriptionCrudController');
    Route::get('blog/under-review/{id}/accept', 'BlogNeedReviewCrudController@accept_blog');
    Route::get('blog/under-review/{id}/reject', 'BlogNeedReviewCrudController@reject_blog');

});