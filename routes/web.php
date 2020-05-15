<?php
Route::get('/', [
    'uses' => 'PagesController@getIndex',
    'as' => 'index'
]);

Route::get('/abon', [
    'uses' => 'PagesController@getAbon',
    'as' => 'abon'
]);

Route::get('/news', [
    'uses' => 'PagesController@getNews',
    'as' => 'news'
]);

Route::get('/conn_consumers', [
    'uses' => 'PagesController@getConnConsumers',
    'as' => 'conn_consumers'
]);

Route::get('/contacts', [
    'uses' => 'PagesController@getContacts',
    'as' => 'contacts'
]);

Route::get('/job', [
    'uses' => 'PagesController@getJob',
    'as' => 'job'
]);

Route::get('/meteo', [
    'uses' => 'PagesController@getMeteo',
    'as' => 'meteo'
]);

Route::get('/pts', [
    'uses' => 'PagesController@getScada',
    'as' => 'pts'
]);

Route::get('/about', [
    'uses' => 'PagesController@getAbout',
    'as' => 'about'
]);

Route::get('/standart', [
    'uses' => 'PagesController@getStandartBf',
    'as' => 'standart'
]);

Route::get('/standart/search', [
    'uses' => 'PagesController@getSearchStandartBf',
    'as' => 'standart.search'
]);

Route::get('/goszak', [
    'uses' => 'PagesController@getGoszak',
    'as' => 'goszak'
]);

Route::get('/goszak/search', [
    'uses' => 'PagesController@getSearchGoszak',
    'as' => 'goszak.search'
]);

Route::get('/fzplan', [
    'uses' => 'PagesController@getPlanFz',
    'as' => 'fzplan'
]);

Route::get('/fzotchet', [
    'uses' => 'PagesController@getFzOtchet',
    'as' => 'fzotchet'
]);

Route::get('/feedback', [
    'uses' => 'PagesController@getFeedback',
    'as' => 'feedback'
]);

Route::get('/pu', [
    'uses' => 'PagesController@getSendPu',
    'as' => 'feedback.pu'
]);

Route::get('/faq', [
    'uses' => 'PagesController@getFaq',
    'as' => 'faq'
]);

Route::get('/scheme', [
    'uses' => 'PagesController@getScheme',
    'as' => 'scheme'
]);

Route::get('/pay', [
    'uses' => 'PagesController@getPay',
    'as' => 'pay'
]);

Route::get('/pay/show/{id}', [
    'uses' => 'PagesController@getPayShowId',
    'as' => 'pay.show'
]);

Route::get('/news/show/{id}', [
    'uses' => 'PagesController@getNewsShowId',
    'as' => 'news.show'
]);

Route::get('/rco', [
    'uses' => 'PagesController@getRco',
    'as' => 'rco'
]);

Route::get('/rco/show/{id}', [
    'uses' => 'PagesController@getRcoShowId',
    'as' => 'rco.show'
]);

Route::get('/rco/maps/{id}', [
    'uses' => 'PagesController@getRcoMapsId',
    'as' => 'rco.maps'
]);

Route::get('/standart/show/{id}', [
    'uses' => 'PagesController@getStandartBfShowId',
    'as' => 'standart.show'
]);

Route::get('/goszak/show/{id}', [
    'uses' => 'PagesController@getGoszakShowId',
    'as' => 'goszak.show'
]);

Route::get('/abon/show/{id}', [
    'uses' => 'PagesController@getAbonShowId',
    'as' => 'abon.show'
]);

Route::get('/conn_consumers/show/{id}', [
    'uses' => 'PagesController@getConnConsumerShowId',
    'as' => 'conn_consumers.show'
]);

Route::get('/about/show/{id}', [
    'uses' => 'PagesController@getAboutShowId',
    'as' => 'about.show'
]);

Route::get('/fzplan/show/{id}', [
    'uses' => 'PagesController@getFzplanShowId',
    'as' => 'fzplan.show'
]);

Route::get('/fzotchet/show/{id}', [
    'uses' => 'PagesController@getFzotchetShowId',
    'as' => 'fzotchet.show'
]);

Route::get('/faq/show/{id}', [
    'uses' => 'PagesController@getFaqShowId',
    'as' => 'faq.show'
]);

Route::get('/faq/webprint/{id}', [
    'uses' => 'PagesController@getFaqPdf2',
    'as' => 'faq.webprint'
]);

Route::post('/send', [
    'uses' => 'PagesController@getSend',
    'as' => 'send'
]);

Route::post('/pu_send', [
    'uses' => 'PagesController@getSend_Pu',
    'as' => 'pu_send'
]);

Route::get('/scheme/show/{id}', [
    'uses' => 'PagesController@getTchemaShowId',
    'as' => 'scheme.show'
]);

Route::post('/meteo/meteo_show', [
    'uses' => 'PagesController@getMeteoShowDate',
    'as' => 'meteo.show'
]);

Route::get('/training', [
    'uses' => 'PagesController@getTraining',
    'as' => 'training'
]);

Route::get('/training/show/{id}', [
    'uses' => 'PagesController@getTrainingShowId',
    'as' => 'training.show'
]);


Route::group(['middleware' => 'auth', 'verified'], function(){
    Route::get('/lkts', [
        'uses' => 'LktsController@getlkts',
        'as' => 'lkts'
    ]);

    Route::get('/lkts#setup', [
        'uses' => 'LktsController@getlktsSetup',
        'as' => 'lkts.index.setup'
    ]);

    Route::get('/pm', [
        'uses' => 'LktsController@getPm',
        'as' => 'pm'
    ]);

    Route::get('/edo', [
        'uses' => 'LktsController@getEdo',
        'as' => 'edo'
    ]);

    Route::get('/pm/create', [
        'uses' => 'LktsController@getPmCreate',
        'as' => 'pm.create'
    ]);

    Route::get('/edo/create', [
        'uses' => 'LktsController@getEdoCreate',
        'as' => 'edo.create'
    ]);

    Route::post('/pm/store', [
        'uses' => 'LktsController@StorePm',
        'as' => 'pm.store'
    ]);

    Route::get('/pm/show/{id}', [
        'uses' => 'LktsController@getPmShowId',
        'as' => 'pm.show'
    ]);

    Route::post('/edo/store', [
        'uses' => 'LktsController@EdoStore',
        'as' => 'edo.store'
    ]);

    Route::get('/edo/edit/{id}', [
        'uses' => 'LktsController@getEdoEdit',
        'as' => 'edo.edit'
    ]);

    Route::post('/edo/fileload', [
        'uses' => 'LktsController@EdoStoreFiels',
        'as' => 'edo.fileload'
    ]);

    Route::post('/edo/edo_store_send', [
        'uses' => 'LktsController@EdoStoreSend',
        'as' => 'edo.save_send'
    ]);

    Route::post('/edo/edo_filedelete/{id}', [
        'uses' => 'LktsController@EdoDeleteFiels',
        'as' => 'edo.filedelete'
    ]);

    Route::get('/edo/status/{id}', [
        'uses' => 'LktsController@getEdoLog',
        'as' => 'edo.log'
    ]);

    Route::get('/ls', [
        'uses' => 'LsController@getLs',
        'as' => 'ls'
    ]);

    Route::get('/ls/create', [
        'uses' => 'LsController@getLsUsersCreate',
        'as' => 'ls.create'
    ]);

    Route::post('/ls/conn_ls_add/', [
        'uses' => 'LsController@storeLsUsersConnLsAdd',
        'as' => 'ls.conn_ls_add'
    ]);

    Route::get('/ls/conn_ls/{id}', [
        'uses' => 'LsController@getLsUsersConnLs',
        'as' => 'ls.conn_ls'
    ]);

    Route::get('/ls/edit/{id}', [
        'uses' => 'LsController@getLsUsersEdit',
        'as' => 'ls.edit'
    ]);

    Route::get('/ls/sendpin/{id}', [
        'uses' => 'LsController@getLsUsersActivePinSend',
        'as' => 'ls.sendpin'
    ]);

    Route::post('/ls/store_pin_ls', [
        'uses' => 'LsController@storePinLs',
        'as' => 'ls.store_pin_ls'
    ]);

    Route::post('/ls/update_ls/{id}', [
        'uses' => 'LsController@UpdateLsUsers',
        'as' => 'ls.update_ls'
    ]);

    Route::post('/ls/store_ls', [
        'uses' => 'LsController@storeLsUsers',
        'as' => 'ls.store_ls'
    ]);

    Route::get('/ls/delete_ls/{id}', [
        'uses' => 'LsController@getLsUsersDelele',
        'as' => 'ls.delete_ls'
    ]);

    Route::get('/ls/pu/create/{id}', [
        'uses' => 'LsController@getLsUsersPuCreate',
        'as' => 'ls.fiels.create'
    ]);

    Route::post('/ls/store_pu', [
        'uses' => 'LsController@storeLsPu',
        'as' => 'ls.store_pu'
    ]);

    Route::get('/ls/edit_pu/{id}', [
        'uses' => 'LsController@getLsUPuEdit',
        'as' => 'ls.edit_pu'
    ]);

    Route::post('/ls/update_pu/{id}', [
        'uses' => 'LsController@storeLsPuUpdate',
        'as' => 'ls.update_pu'
    ]);

    Route::get('/ls/pu/create_dog/{id}', [
        'uses' => 'LsController@getLsUsersDogCreate',
        'as' => 'ls.dog.create'
    ]);

    Route::get('/ls/edit_dog/{id}', [
        'uses' => 'LsController@getLsUsersDogEdit',
        'as' => 'ls.dog.edit'
    ]);

    Route::post('/ls/store_dog', [
        'uses' => 'LsController@storeLsDog',
        'as' => 'ls.store_dog'
    ]);

    Route::post('/ls/update_dog/{id}', [
        'uses' => 'LsController@storeLsDogUpdate',
        'as' => 'ls.update_dog'
    ]);

    Route::get('/ls/create_dog_file/{id}', [
        'uses' => 'LsController@createFileDog',
        'as' => 'ls.create_dog_file'
    ]);

    Route::post('/ls/store_dog_file', [
        'uses' => 'LsController@storeLsDogFile',
        'as' => 'ls.store_dog_file'
    ]);

    Route::get('/ls/get_ls_checksystem', [
        'uses' => 'LsController@getLsCheckSystem',
        'as' => 'ls.ls.check.system'
    ]);

    Route::get('/ls/get_numberpu_checksystem', [
        'uses' => 'LsController@getNumberPuCheckSystem',
        'as' => 'ls.number.pu.check.system'
    ]);

    Route::get('/ls/create_puots/{id}', [
        'uses' => 'LsController@getLsUsersPuCreatePuots',
        'as' => 'ls.create_puots'
    ]);

    Route::post('/ls/store_puots', [
        'uses' => 'LsController@storeUsersPuCreatePuots',
        'as' => 'ls.store_puots'
    ]);

    Route::get('/ls/edit_puots/{id}', [
        'uses' => 'LsController@editUsersPuCreatePuots',
        'as' => 'ls.edit_puots'
    ]);

    Route::get('/ls/edit_puots_addp/{id}', [
        'uses' => 'LsController@editUsersPuCreatePuotsAddP',
        'as' => 'ls.edit_puots_addp'
    ]);

    Route::post('/ls/store_puots_addp', [
        'uses' => 'LsController@storeUsersPuCreatePuotsAddP',
        'as' => 'ls.store_puots_addp'
    ]);

    Route::get('/ls/get_pu_create_puots_addp', [
        'uses' => 'LsController@getUsersPuCreatePuotsAddP',
        'as' => 'ls.number.pu.check.puots_addp'
    ]);

    Route::post('/ls/send_puots', [
        'uses' => 'LsController@sendPuotsPu',
        'as' => 'ls.send_puots'
    ]);

    Route::get('/ls/webprint/{id}', [
        'uses' => 'LsController@getPdfNew',
        'as' => 'ls.webprint'
    ]);
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'su', 'verified']], function(){
    Route::get('/setup/site/{id}', [
        'uses' => 'Admin\AdminController@getAdminSetupSite',
        'as' => 'admin.setup.site'
    ]);

    Route::get('/pages/edit/{id}', [
        'uses' => 'Admin\AdminController@getAdminPagesEdit',
        'as' => 'admin.pages.edit'
    ]);

    Route::post('/pages/update/{id}', [
        'uses' => 'Admin\AdminController@updateAdminPages',
        'as' => 'admin.pages.update'
    ]);

    Route::post('/setup/site/update/{id}', [
        'uses' => 'Admin\AdminController@updateAdminSetupSite',
        'as' => 'admin.setup.site.update'
    ]);

    Route::post('/lsu/load_data', [
        'uses' => 'Admin\AdminController@load_data',
        'as' => 'admin.lsu.load_data'
    ]);

    Route::get('/home/abon/', [
        'uses' => 'Admin\AdminAbon@getAdminHomeAbon',
        'as' => 'admin.home.abon'
    ]);

    Route::get('/home/abon/create', [
        'uses' => 'Admin\AdminAbon@createAdminHomeAbon',
        'as' => 'admin.home.abon.create'
    ]);

    Route::post('/home/abon/update/{id}', [
        'uses' => 'Admin\AdminAbon@updateAdminHomeAbon',
        'as' => 'admin.home.abon.update'
    ]);

    Route::post('/home/abon/store', [
        'uses' => 'Admin\AdminAbon@storeAdminHomeAbon',
        'as' => 'admin.home.abon.store'
    ]);

    Route::get('/home/abon/edit/{id}', [
        'uses' => 'Admin\AdminAbon@editAdminHomeAbon',
        'as' => 'admin.home.abon.edit'
    ]);

    Route::get('/home/abon/delete/{id}', [
        'uses' => 'Admin\AdminAbon@deleteAdminHomeAbon',
        'as' => 'admin.home.abon.delete'
    ]);

    Route::get('/home/abon/fiels_abon_show/create/{id}', [
        'uses' => 'Admin\AdminAbon@showFileAdminHomeAbon',
        'as' => 'admin.home.abon.fiels.create'
    ]);

    Route::post('/home/abon/fiels_abon_show/store', [
        'uses' => 'Admin\AdminAbon@storeFileAdminHomeAbon',
        'as' => 'admin.home.abon.fiels.store'
    ]);

    Route::get('/home/abon/fiels_abon_show/delete/{id}', [
        'uses' => 'Admin\AdminAbon@deleteFileAdminHomeAbon',
        'as' => 'admin.home.abon.fiels.delete'
    ]);

    Route::get('/home/about/', [
        'uses' => 'Admin\AdminAbout@getAdminHomeAbout',
        'as' => 'admin.home.about'
    ]);

    Route::get('/home/about/edit/{id}', [
        'uses' => 'Admin\AdminAbout@editAdminHomeAbout',
        'as' => 'admin.home.about.edit'
    ]);

    Route::get('/home/about/create', [
        'uses' => 'Admin\AdminAbout@createAdminHomeAbout',
        'as' => 'admin.home.about.create'
    ]);

    Route::post('/home/about/update/{id}', [
        'uses' => 'Admin\AdminAbout@updateAdminHomeAbout',
        'as' => 'admin.home.about.update'
    ]);

    Route::post('/home/about/store', [
        'uses' => 'Admin\AdminAbout@storeAdminHomeAbout',
        'as' => 'admin.home.about.store'
    ]);

    Route::get('/home/about/delete/{id}', [
        'uses' => 'Admin\AdminAbout@deleteAdminHomeAbout',
        'as' => 'admin.home.about.delete'
    ]);

    Route::get('/home/conn_consumers/', [
        'uses' => 'Admin\AdminConnConsumers@getAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers'
    ]);

    Route::get('/home/conn_consumers/create', [
        'uses' => 'Admin\AdminConnConsumers@createAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers.create'
    ]);

    Route::post('/home/conn_consumers/update/{id}', [
        'uses' => 'Admin\AdminConnConsumers@updateAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers.update'
    ]);

    Route::post('/home/conn_consumers/store', [
        'uses' => 'Admin\AdminConnConsumers@storeAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers.store'
    ]);

    Route::get('/home/conn_consumers/edit/{id}', [
        'uses' => 'Admin\AdminConnConsumers@editAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers.edit'
    ]);

    Route::get('/home/conn_consumers/delete/{id}', [
        'uses' => 'Admin\AdminConnConsumers@deleteAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers.delete'
    ]);

    Route::get('/home/conn_consumers/fiels_abon_show/create/{id}', [
        'uses' => 'Admin\AdminConnConsumers@showFileAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers.fiels.create'
    ]);

    Route::post('/home/conn_consumers/fiels_abon_show/store', [
        'uses' => 'Admin\AdminConnConsumers@storeFileAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers.fiels.store'
    ]);

    Route::get('/home/conn_consumers/fiels_abon_show/delete/{id}', [
        'uses' => 'Admin\AdminConnConsumers@deleteFileAdminHomeConnConsumers',
        'as' => 'admin.home.conn_consumers.fiels.delete'
    ]);

    Route::get('/home/rco/', [
        'uses' => 'Admin\AdminRco@getAdminHomeRco',
        'as' => 'admin.home.rco'
    ]);

    Route::get('/home/rco/create', [
        'uses' => 'Admin\AdminRco@createAdminHomeRco',
        'as' => 'admin.home.rco.create'
    ]);

    Route::post('/home/rco/update/{id}', [
        'uses' => 'Admin\AdminRco@updateAdminHomeRco',
        'as' => 'admin.home.rco.update'
    ]);

    Route::post('/home/rco/store', [
        'uses' => 'Admin\AdminRco@storeAdminHomeRco',
        'as' => 'admin.home.rco.store'
    ]);

    Route::get('/home/rco/edit/{id}', [
        'uses' => 'Admin\AdminRco@editAdminHomeRco',
        'as' => 'admin.home.rco.edit'
    ]);

    Route::get('/home/rco/delete/{id}', [
        'uses' => 'Admin\AdminRco@deleteAdminHomeRco',
        'as' => 'admin.home.rco.delete'
    ]);

    Route::get('/home/rco/fiels_abon_show/create/{id}', [
        'uses' => 'Admin\AdminRco@showFileAdminHomeRco',
        'as' => 'admin.home.rco.fiels.create'
    ]);

    Route::get('/home/rco/maps/create/{id}', [
        'uses' => 'Admin\AdminRco@showMaspAdminHomeRco',
        'as' => 'admin.home.rco.create_maps'
    ]);

    Route::post('/home/rco/fiels_abon_show/store', [
        'uses' => 'Admin\AdminRco@storeFileAdminHomeRco',
        'as' => 'admin.home.rco.fiels.store'
    ]);

    Route::get('/home/rco/fiels_abon_show/delete/{id}', [
        'uses' => 'Admin\AdminRco@deleteFileAdminHomeRco',
        'as' => 'admin.home.rco.fiels.delete'
    ]);

    Route::post('/home/rco/map_store', [
        'uses' => 'Admin\AdminRco@storeAdminHomeRcoMap',
        'as' => 'admin.home.rco.maps.store'
    ]);

    Route::get('/home/rco/map_edit/{id}', [
        'uses' => 'Admin\AdminRco@editAdminHomeRcoMap',
        'as' => 'admin.home.rco.maps.edit'
    ]);

    Route::post('/home/rco/map_update/{id}', [
        'uses' => 'Admin\AdminRco@updateAdminHomeRcoMap',
        'as' => 'admin.home.rco.maps.update'
    ]);

    Route::get('/home/rco/map_delete/{id}', [
        'uses' => 'Admin\AdminRco@deleteAdminHomeRcoMap',
        'as' => 'admin.home.rco.maps.delete'
    ]);

    Route::get('/home/standart/', [
        'uses' => 'Admin\AdminStandart@getAdminHomeStandart',
        'as' => 'admin.home.standart'
    ]);

    Route::get('/home/standart/create', [
        'uses' => 'Admin\AdminStandart@createAdminHomeStandart',
        'as' => 'admin.home.standart.create'
    ]);

    Route::post('/home/standart/update/{id}', [
        'uses' => 'Admin\AdminStandart@updateAdminHomeStandart',
        'as' => 'admin.home.standart.update'
    ]);

    Route::post('/home/standart/store', [
        'uses' => 'Admin\AdminStandart@storeAdminHomeStandart',
        'as' => 'admin.home.standart.store'
    ]);

    Route::get('/home/standart/edit/{id}', [
        'uses' => 'Admin\AdminStandart@editAdminHomeStandart',
        'as' => 'admin.home.standart.edit'
    ]);

    Route::get('/home/standart/delete/{id}', [
        'uses' => 'Admin\AdminStandart@deleteAdminHomeStandart',
        'as' => 'admin.home.standart.delete'
    ]);

    Route::get('/home/standart/fiels_abon_show/create/{id}', [
        'uses' => 'Admin\AdminStandart@showFileAdminHomeStandart',
        'as' => 'admin.home.standart.fiels.create'
    ]);

    Route::post('/home/standart/fiels_abon_show/store', [
        'uses' => 'Admin\AdminStandart@storeFileAdminHomeStandart',
        'as' => 'admin.home.standart.fiels.store'
    ]);

    Route::get('/home/standart/fiels_abon_show/delete/{id}', [
        'uses' => 'Admin\AdminStandart@deleteFileAdminHomeStandart',
        'as' => 'admin.home.standart.fiels.delete'
    ]);

    Route::get('/home/faq/', [
        'uses' => 'Admin\AdminFaq@getAdminHomeFaq',
        'as' => 'admin.home.faq'
    ]);

    Route::get('/home/faq/edit/{id}', [
        'uses' => 'Admin\AdminFaq@editAdminHomeFaq',
        'as' => 'admin.home.faq.edit'
    ]);

    Route::get('/home/faq/create', [
        'uses' => 'Admin\AdminFaq@createAdminHomeFaq',
        'as' => 'admin.home.faq.create'
    ]);

    Route::post('/home/faq/update/{id}', [
        'uses' => 'Admin\AdminFaq@updateAdminHomeFaq',
        'as' => 'admin.home.faq.update'
    ]);

    Route::get('/home/faq/delete/{id}', [
        'uses' => 'Admin\AdminFaq@deleteAdminHomeFaq',
        'as' => 'admin.home.faq.delete'
    ]);

    Route::get('/home/fzplan/', [
        'uses' => 'Admin\AdminPlan@getAdminHomePlan',
        'as' => 'admin.home.fzplan'
    ]);

    Route::get('/home/fzplan/create', [
        'uses' => 'Admin\AdminPlan@createAdminHomePlan',
        'as' => 'admin.home.fzplan.create'
    ]);

    Route::post('/home/fzplan/update/{id}', [
        'uses' => 'Admin\AdminPlan@updateAdminHomePlan',
        'as' => 'admin.home.fzplan.update'
    ]);

    Route::post('/home/fzplan/store', [
        'uses' => 'Admin\AdminPlan@storeAdminHomePlan',
        'as' => 'admin.home.fzplan.store'
    ]);

    Route::get('/home/fzplan/edit/{id}', [
        'uses' => 'Admin\AdminPlan@editAdminHomePlan',
        'as' => 'admin.home.fzplan.edit'
    ]);

    Route::get('/home/fzplan/delete/{id}', [
        'uses' => 'Admin\AdminPlan@deleteAdminHomePlan',
        'as' => 'admin.home.fzplan.delete'
    ]);

    Route::get('/home/fzplan/fiels_abon_show/create/{id}', [
        'uses' => 'Admin\AdminPlan@showFileAdminHomePlan',
        'as' => 'admin.home.fzplan.fiels.create'
    ]);

    Route::post('/home/fzplan/fiels_abon_show/store', [
        'uses' => 'Admin\AdminPlan@storeFileAdminHomePlan',
        'as' => 'admin.home.fzplan.fiels.store'
    ]);

    Route::get('/home/fzplan/fiels_abon_show/delete/{id}', [
        'uses' => 'Admin\AdminPlan@deleteFileAdminHomePlan',
        'as' => 'admin.home.fzplan.fiels.delete'
    ]);

    Route::get('/home/fzotchet/', [
        'uses' => 'Admin\AdminOtchet@getAdminHomeOtchet',
        'as' => 'admin.home.fzotchet'
    ]);

    Route::get('/home/fzotchet/create', [
        'uses' => 'Admin\AdminOtchet@createAdminHomeOtchet',
        'as' => 'admin.home.fzotchet.create'
    ]);

    Route::post('/home/fzotchet/update/{id}', [
        'uses' => 'Admin\AdminOtchet@updateAdminHomeOtchet',
        'as' => 'admin.home.fzotchet.update'
    ]);

    Route::post('/home/fzotchet/store', [
        'uses' => 'Admin\AdminOtchet@storeAdminHomeOtchet',
        'as' => 'admin.home.fzotchet.store'
    ]);

    Route::get('/home/fzotchet/edit/{id}', [
        'uses' => 'Admin\AdminOtchet@editAdminHomeOtchet',
        'as' => 'admin.home.fzotchet.edit'
    ]);

    Route::get('/home/fzotchet/delete/{id}', [
        'uses' => 'Admin\AdminOtchet@deleteAdminHomeOtchet',
        'as' => 'admin.home.fzotchet.delete'
    ]);

    Route::get('/home/fzotchet/fiels_abon_show/create/{id}', [
        'uses' => 'Admin\AdminOtchet@showFileAdminHomeOtchet',
        'as' => 'admin.home.fzotchet.fiels.create'
    ]);

    Route::post('/home/fzotchet/fiels_abon_show/store', [
        'uses' => 'Admin\AdminOtchet@storeFileAdminHomeOtchet',
        'as' => 'admin.home.fzotchet.fiels.store'
    ]);

    Route::get('/home/fzotchet/fiels_abon_show/delete/{id}', [
        'uses' => 'Admin\AdminOtchet@deleteFileAdminHomeOtchet',
        'as' => 'admin.home.fzotchet.fiels.delete'
    ]);

    Route::get('/home/goszak/', [
        'uses' => 'Admin\AdminGoszak@getAdminHomeGoszak',
        'as' => 'admin.home.goszak'
    ]);

    Route::get('/home/goszak/create', [
        'uses' => 'Admin\AdminGoszak@createAdminHomeGoszak',
        'as' => 'admin.home.goszak.create'
    ]);

    Route::post('/home/goszak/update/{id}', [
        'uses' => 'Admin\AdminGoszak@updateAdminHomeGoszak',
        'as' => 'admin.home.goszak.update'
    ]);

    Route::post('/home/goszak/store', [
        'uses' => 'Admin\AdminGoszak@storeAdminHomeGoszak',
        'as' => 'admin.home.goszak.store'
    ]);

    Route::get('/home/goszak/edit/{id}', [
        'uses' => 'Admin\AdminGoszak@editAdminHomeGoszak',
        'as' => 'admin.home.goszak.edit'
    ]);

    Route::get('/home/goszak/delete/{id}', [
        'uses' => 'Admin\AdminGoszak@deleteAdminHomeGoszak',
        'as' => 'admin.home.goszak.delete'
    ]);

    Route::get('/home/goszak/fiels_abon_show/create/{id}', [
        'uses' => 'Admin\AdminGoszak@showFileAdminHomeGoszak',
        'as' => 'admin.home.goszak.fiels.create'
    ]);

    Route::post('/home/goszak/fiels_abon_show/store', [
        'uses' => 'Admin\AdminGoszak@storeFileAdminHomeGoszak',
        'as' => 'admin.home.goszak.fiels.store'
    ]);

    Route::get('/home/goszak/fiels_abon_show/delete/{id}', [
        'uses' => 'Admin\AdminGoszak@deleteFileAdminHomeGoszak',
        'as' => 'admin.home.goszak.fiels.delete'
    ]);

    Route::get('/home/goszak/fiels_dog_show/delete/{id}', [
        'uses' => 'Admin\AdminGoszak@deleteDogAdminHomeGoszak',
        'as' => 'admin.home.goszak.dog.delete'
    ]);

    Route::get('/home/goszak/fiels_dog_show/create/{id}', [
        'uses' => 'Admin\AdminGoszak@showDogAdminHomeGoszak',
        'as' => 'admin.home.goszak.dog.create'
    ]);

    Route::post('/home/goszak/dog/store', [
        'uses' => 'Admin\AdminGoszak@storeDogAdminHomeGoszak',
        'as' => 'admin.home.goszak.dog.store'
    ]);

    Route::get('/home/scheme/', [
        'uses' => 'Admin\AdminScheme@getAdminHomeScheme',
        'as' => 'admin.home.scheme'
    ]);

    Route::get('/home/scheme/create', [
        'uses' => 'Admin\AdminScheme@createAdminHomeScheme',
        'as' => 'admin.home.scheme.create'
    ]);

    Route::post('/home/scheme/update/{id}', [
        'uses' => 'Admin\AdminScheme@updateAdminHomeScheme',
        'as' => 'admin.home.scheme.update'
    ]);

    Route::post('/home/scheme/store', [
        'uses' => 'Admin\AdminScheme@storeAdminHomeScheme',
        'as' => 'admin.home.scheme.store'
    ]);

    Route::get('/home/scheme/edit/{id}', [
        'uses' => 'Admin\AdminScheme@editAdminHomeScheme',
        'as' => 'admin.home.scheme.edit'
    ]);

    Route::get('/home/scheme/delete/{id}', [
        'uses' => 'Admin\AdminScheme@deleteAdminHomeScheme',
        'as' => 'admin.home.scheme.delete'
    ]);

    Route::get('/home/scheme/fiels_scheme_show/create/{id}', [
        'uses' => 'Admin\AdminScheme@showFileAdminHomeScheme',
        'as' => 'admin.home.scheme.fiels.create'
    ]);

    Route::post('/home/scheme/fiels_scheme_show/store', [
        'uses' => 'Admin\AdminScheme@storeFileAdminHomeScheme',
        'as' => 'admin.home.scheme.fiels.store'
    ]);

    Route::get('/home/scheme/fiels_scheme_show/delete/{id}', [
        'uses' => 'Admin\AdminScheme@deleteFileAdminHomeScheme',
        'as' => 'admin.home.scheme.fiels.delete'
    ]);

    Route::get('/lkts/pm/', [
        'uses' => 'Admin\AdminLktsPm@getAdminLktsPm',
        'as' => 'admin.lkts.pm'
    ]);

    Route::post('/lkts/pm/update/{id}', [
        'uses' => 'Admin\AdminLktsPm@updateAdminLktsPm',
        'as' => 'admin.lkts.pm.update'
    ]);

    Route::get('/lkts/pm/edit/{id}', [
        'uses' => 'Admin\AdminLktsPm@editAdminLktsPm',
        'as' => 'admin.lkts.pm.edit'
    ]);

    Route::get('/lkts/pm/delete/{id}', [
        'uses' => 'Admin\AdminLktsPm@deleteAdminLktsPm',
        'as' => 'admin.lkts.pm.delete'
    ]);

    Route::get('/lkts/edo/', [
        'uses' => 'Admin\AdminLktsEdo@getAdminLktsEdo',
        'as' => 'admin.lkts.edo'
    ]);

    Route::post('/lkts/edo/update/{id}', [
        'uses' => 'Admin\AdminLktsEdo@updateAdminLktsEdo',
        'as' => 'admin.lkts.edo.update'
    ]);

    Route::get('/lkts/edo/edit/{id}', [
        'uses' => 'Admin\AdminLktsEdo@editAdminLktsEdo',
        'as' => 'admin.lkts.edo.edit'
    ]);

    Route::get('/lkts/edo/delete/{id}', [
        'uses' => 'Admin\AdminLktsEdo@deleteAdminLktsEdo',
        'as' => 'admin.lkts.edo.delete'
    ]);

    Route::post('/home/edo_log/store', [
        'uses' => 'Admin\AdminScheme@storeAdminLktsEdo_Log',
        'as' => 'admin.lkts.edo_log.store'
    ]);

    Route::get('/imports/lsu', [
        'uses' => 'Admin\AdminLktsImport@getAdminImportsLsuIndex',
        'as' => 'admin.imports.lsu'
    ]);

    Route::get('/imports/lsu_ompts', [
        'uses' => 'Admin\AdminLktsImportOmpts@getAdminImportsLsuOmptsIndex',
        'as' => 'admin.imports.lsu_ompts'
    ]);

    Route::get('/lkts/lsu/', [
        'uses' => 'Admin\AdminLktsLsu@getAdminLktsLsu',
        'as' => 'admin.lkts.lsu'
    ]);

    Route::get('/lkts/lsu/show/{id}', [
        'uses' => 'Admin\AdminLktsLsu@getAdminLktsLsuShow',
        'as' => 'admin.lkts.lsu.show'
    ]);

    Route::get('/lkts/lsu/edit/{id}', [
        'uses' => 'Admin\AdminLktsLsu@getAdminLktsLsuEdit',
        'as' => 'admin.lkts.lsu.edit'
    ]);

    Route::get('/lkts/lsu/create_pu/{id}', [
        'uses' => 'Admin\AdminLktsLsu@getAdminLktsLsuPuCreate',
        'as' => 'admin.lkts.lsu.createpu'
    ]);

    Route::post('/lkts/lsu/store_pu', [
        'uses' => 'Admin\AdminLktsLsu@storeLsPu',
        'as' => 'admin.lkts.lsu.store_pu'
    ]);

    Route::post('/lkts/lsu/update_pu/{id}', [
        'uses' => 'Admin\AdminLktsLsu@storeLsPuUpdate',
        'as' => 'admin.lkts.lsu.update_pu'
    ]);

    Route::get('/lkts/lsu/edit_pu/{id}', [
        'uses' => 'Admin\AdminLktsLsu@getLsUPuEdit',
        'as' => 'admin.lkts.lsu.edit_pu'
    ]);

    Route::get('/lkts/lsu/loadfilepu/{id}', [
        'uses' => 'Admin\AdminLktsLsu@getLsuPuFile',
        'as' => 'admin.lkts.lsu.loadfilepu'
    ]);

    Route::post('/lkts/lsu/store_pu_file', [
        'uses' => 'Admin\AdminLktsLsu@storeLsPuFile',
        'as' => 'admin.lkts.lsu.store_pu_file'
    ]);

    Route::get('/lkts/lsu/edit_puots/{id}', [
        'uses' => 'Admin\AdminLktsLsu@editUsersPuCreatePuots',
        'as' => 'admin.lkts.lsu.edit_puots'
    ]);
    
    Route::get('/lkts/lsu/create_puots/{id}', [
        'uses' => 'Admin\AdminLktsLsu@getLsUsersPuCreatePuots',
        'as' => 'admin.lkts.lsu.create_puots'
    ]);

    Route::post('/lkts/lsu/store_puots', [
        'uses' => 'Admin\AdminLktsLsu@storeUsersPuCreatePuots',
        'as' => 'admin.lkts.lsu.store_puots'
    ]);

    Route::post('/lkts/lsu/store_puots_addp', [
        'uses' => 'Admin\AdminLktsLsu@storeUsersPuCreatePuotsAddP',
        'as' => 'admin.lkts.lsu.store_puots_addp'
    ]);

    Route::get('/lkts/lsu/edit_puots_addp/{id}', [
        'uses' => 'Admin\AdminLktsLsu@editUsersPuCreatePuotsAddP',
        'as' => 'admin.lkts.lsu.edit_puots_addp'
    ]);

    Route::post('/lkts/lsu/send_puots', [
        'uses' => 'Admin\AdminLktsLsu@sendPuotsPu',
        'as' => 'admin.lkts.lsu.send_puots'
    ]);

    Route::get('/lkts/lsu/webprint/{id}', [
        'uses' => 'Admin\AdminLktsLsu@getPdfNew',
        'as' => 'admin.lkts.lsu.webprint'
    ]);

    Route::get('/spr/typegoszaks', [
        'uses' => 'Admin\AdminTypegoszaks@getAdminTypegoszaks',
        'as' => 'admin.spr.typegoszaks'
    ]);

    Route::post('/spr/typegoszaks/store', [
        'uses' => 'Admin\AdminTypegoszaks@storeAdminTypegoszaks',
        'as' => 'admin.spr.typegoszaks.store'
    ]);

    Route::put('/spr/typegoszaks/edit', [
        'uses' => 'Admin\AdminTypegoszaks@editAdminTypegoszaks',
        'as' => 'admin.spr.typegoszaks.edit'
    ]);

    Route::delete('/spr/typegoszaks/delete/{id}', [
        'uses' => 'Admin\AdminTypegoszaks@deleteAdminTypegoszaks',
        'as' => 'admin.spr.typegoszaks.delete'
    ]);

    Route::post('/imports/lsu/uploadfilelslsu', [
        'uses' => 'Admin\AdminLktsImport@UploadFielsLsu',
        'as' => 'admin.imports.lsu.uploadfilelslsu'
    ]);

    Route::post('/imports/lsu/uploadfilelscsv', [
        'uses' => 'Admin\AdminImportCsv@UploadFielsCsv',
        'as' => 'admin.imports.lsu.uploadfilelscsv'
    ]);

    Route::get('/imports/lsu/closelsumount', [
        'uses' => 'Admin\AdminLktsImport@getSqlBackeupLsu',
        'as' => 'admin.imports.lsu.closelsumount'
    ]);

    Route::get('/imports/lsu/loadpdf', [
        'uses' => 'Admin\AdminLktsImport@getLoadPdfLsu',
        'as' => 'admin.imports.lsu.loadpdf'
    ]);

    Route::get('/imports/lsu/loadcsv', [
        'uses' => 'Admin\AdminLktsImport@getLoadCsvLsu',
        'as' => 'admin.imports.lsu.loadcsv'
    ]);

    Route::get('/imports/lsu/qrcode', [
        'uses' => 'Admin\AdminLktsImport@getQrCodeGenerate',
        'as' => 'admin.imports.lsu.qrcode'
    ]);

    Route::get('/imports/lsu_ompts/loadcsv', [
        'uses' => 'Admin\AdminLktsImportOmpts@getLoadCsvOmptsLsu',
        'as' => 'admin.imports.lsu_ompts.loadcsv'
    ]);

    Route::post('/imports/lsu_ompts/uploadfilelscsvompts', [
        'uses' => 'Admin\AdminImportCsv@UploadOmptsFielsCsv',
        'as' => 'admin.imports.lsu_ompts.uploadfilelscsvompts'
    ]);

    Route::get('/imports/lsu_ompts/qrcode', [
        'uses' => 'Admin\AdminLktsImportOmpts@getQrCodeGenerateOmpts',
        'as' => 'admin.imports.lsu_ompts.qrcode'
    ]);

    Route::get('/imports/lsu_ompts/loadxmlchange', [
        'uses' => 'Admin\AdminLktsImportOmpts@getLoadXmlOmptsLsuChange',
        'as' => 'admin.imports.lsu_ompts.loadxmlchange'
    ]);

    Route::post('/imports/lsu_ompts/uploadchangexml', [
        'uses' => 'Admin\AdminImportCsv@UploadLsuOmptsChangeXml',
        'as' => 'admin.imports.lsu_ompts.uploadchangexml'
    ]);

    Route::get('/imports/lsu_ompts/loadxmlmini', [
        'uses' => 'Admin\AdminLktsImportOmpts@getLoadXmlOmptsLsuMini',
        'as' => 'admin.imports.lsu_ompts.loadxmlmini'
    ]);
    
    Route::post('/imports/lsu_ompts/uploadminixml', [
        'uses' => 'Admin\AdminImportCsv@UploadLsuOmptsMiniXml',
        'as' => 'admin.imports.lsu_ompts.uploadminixml'
    ]);

    Route::get('/imports/lsu_ompts/closelsumount', [
        'uses' => 'Admin\AdminLktsImport@getSqlBackeupLsuOmpts',
        'as' => 'admin.imports.lsu_ompts.closelsumount'
    ]);
    
    Route::get('/home/pay/', [
        'uses' => 'Admin\AdminPay@getAdminHomePay',
        'as' => 'admin.home.pay'
    ]);

    Route::get('/home/pay/create', [
        'uses' => 'Admin\AdminPay@createAdminHomePay',
        'as' => 'admin.home.pay.create'
    ]);

    Route::post('/home/pay/update/{id}', [
        'uses' => 'Admin\AdminPay@updateAdminHomePay',
        'as' => 'admin.home.pay.update'
    ]);

    Route::post('/home/pay/store', [
        'uses' => 'Admin\AdminPay@storeAdminHomePay',
        'as' => 'admin.home.pay.store'
    ]);

    Route::get('/home/pay/edit/{id}', [
        'uses' => 'Admin\AdminPay@editAdminHomePay',
        'as' => 'admin.home.pay.edit'
    ]);

    Route::get('/home/pay/delete/{id}', [
        'uses' => 'Admin\AdminPay@deleteAdminHomePay',
        'as' => 'admin.home.pay.delete'
    ]);

    Route::get('/home/news/', [
        'uses' => 'Admin\AdminNews@getAdminHomeNews',
        'as' => 'admin.home.news'
    ]);

    Route::get('/home/news/create', [
        'uses' => 'Admin\AdminNews@createAdminHomeNews',
        'as' => 'admin.home.news.create'
    ]);

    Route::post('/home/news/update/{id}', [
        'uses' => 'Admin\AdminNews@updateAdminHomeNews',
        'as' => 'admin.home.news.update'
    ]);

    Route::post('/home/news/store', [
        'uses' => 'Admin\AdminNews@storeAdminHomeNews',
        'as' => 'admin.home.news.store'
    ]);

    Route::get('/home/news/edit/{id}', [
        'uses' => 'Admin\AdminNews@editAdminHomeNews',
        'as' => 'admin.home.news.edit'
    ]);

    Route::get('/home/news/delete/{id}', [
        'uses' => 'Admin\AdminNews@deleteAdminHomeNews',
        'as' => 'admin.home.news.delete'
    ]);

    Route::get('/home/news/fiels_news_show/create/{id}', [
        'uses' => 'Admin\AdminNews@showFileAdminHomeNews',
        'as' => 'admin.home.news.fiels.create'
    ]);

    Route::post('/home/news/fiels_news_show/store', [
        'uses' => 'Admin\AdminNews@storeFileAdminHomeNews',
        'as' => 'admin.home.news.fiels.store'
    ]);

    Route::get('/home/abon/fiels_news_show/delete/{id}', [
        'uses' => 'Admin\AdminNews@deleteFileAdminHomeNews',
        'as' => 'admin.home.news.fiels.delete'
    ]);
});

Auth::routes(['verify' => true]);