<?php

Route::get('/', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    return view('backend.index',['breadcrumb'=>$breadcrumb]);
    
})->name('home');

Route::get('/',[
			'as'=>'index',
			'uses'=>'AdminController@index'
	]);

Route::post('/logout',[
			'as'=>'logout',
			'uses'=>'AdminAuth\LoginController@logout'
]);

	

Route::group(['prefix' => 'config', 'as' => 'config.'], function () {
		
		Route::get('/',[
			'as'=>'index',
			'uses'=>'ConfigSystemController@adminIndex'
		]);
		Route::put('/{id}/update',[
			'as'=>'update',
			'uses'=>'ConfigSystemController@adminUpdate'
		]);

	});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
		
		Route::get('/',[
			'as'=>'index',
			'uses'=>'CategoryController@adminIndex'
		]);

	});


	Route::group(['prefix' => 'question', 'as' => 'question.'], function () {

		Route::group(['prefix' => 'type', 'as' => 'type.'], function () {
			
				Route::get('/',[
					'as'=>'index',
					'uses'=>'QuestionTypeController@adminIndex'
			]);

		});

		Route::get('/',[
			'as'=>'index',
			'uses'=>'QuestionController@adminIndex'
		]);

		Route::get('/add',[
			'as'=>'create',
			'uses'=>'QuestionController@adminCreate'
		]);

		Route::post('/store',[
			'as'=>'store',
			'uses'=>'QuestionController@adminStore'
		]);

	
		Route::get('/{id}/edit',[
			'as'=>'edit',
			'uses'=>'QuestionController@adminEdit'
		]);

		Route::put('/{id}/update',[
			'as'=>'update',
			'uses'=>'QuestionController@adminUpdate'
		]);

		Route::post('/{id}/delete',[
			'as'=>'delete',
			'uses'=>'QuestionController@adminDelete'
		]);
	
	});
	
	Route::group(['prefix'=>'article', 'as'=>'article.'],function(){

		Route::get('/',[
			'as'=>'index',
			'uses'=>'ActicleController@adminIndex'
		]);

		Route::get('/add',[
			'as'=>'create',
			'uses'=>'ActicleController@adminCreate'
		]);

		Route::post('/create',[
			'as'=>'store',
			'uses'=>'ActicleController@adminStore'
		]);

		Route::get('/{id}/edit',[
			'as'=>'edit',
			'uses'=>'ActicleController@adminEdit'
		]);

		Route::put('/{id}/update',[
			'as'=>'update',
			'uses'=>'ActicleController@adminUpdate'
		]);

		Route::post('/{id}/delete',[
			'as'=>'delete',
			'uses'=>'ActicleController@adminDelete'
		]);

	});

	Route::group(['prefix'=>'exam', 'as'=>'exam.'],function(){

		Route::get('/',[
			'as'=>'index',
			'uses'=>'ExamController@adminIndex'
		]);

		Route::get('/add',[
			'as'=>'create',
			'uses'=>'ExamController@adminCreate'
		]);

		Route::post('/create',[
			'as'=>'store',
			'uses'=>'ExamController@adminStore'
		]);

		Route::post('/question',[
			'as'=>'question',
			'uses'=>'ExamController@adminGetOption'
		]);

		Route::get('/question-datatable',[
			'as'=>'datatable',
			'uses'=>'ExamController@adminDatableQuestion'
		]);


		Route::get('/{id}/edit',[
			'as'=>'edit',
			'uses'=>'ExamController@adminEdit'
		]);

		Route::put('/{id}/update',[
			'as'=>'update',
			'uses'=>'ExamController@adminUpdate'
		]);

		Route::post('/{id}/delete',[
			'as'=>'delete',
			'uses'=>'ExamController@adminDelete'
		]);

	});

	Route::group(['prefix'=>'admin', 'as'=>'admin.'],function(){

		Route::get('/',[
			'as'=>'index',
			'uses'=>'AdminController@adminIndex'
		]);

		Route::get('/add',[
			'as'=>'create',
			'uses'=>'AdminController@adminCreate'
		]);

		Route::post('/create',[
			'as'=>'store',
			'uses'=>'AdminController@adminStore'
		]);


		Route::get('/{id}/edit',[
			'as'=>'edit',
			'uses'=>'AdminController@adminEdit'
		]);

		Route::put('/{id}/update',[
			'as'=>'update',
			'uses'=>'AdminController@adminUpdate'
		]);

		Route::post('/{id}/delete',[
			'as'=>'delete',
			'uses'=>'AdminController@adminDelete'
		]);

	});


	Route::group(['prefix'=>'role', 'as'=>'role.'],function(){

		Route::get('/',[
			'as'=>'index',
			'uses'=>'RoleController@adminIndex'
		]);

		Route::get('/add',[
			'as'=>'create',
			'uses'=>'RoleController@adminCreate'
		]);

		Route::post('/create',[
			'as'=>'store',
			'uses'=>'RoleController@adminStore'
		]);


		Route::get('/{id}/edit',[
			'as'=>'edit',
			'uses'=>'RoleController@adminEdit'
		]);

		Route::put('/{id}/update',[
			'as'=>'update',
			'uses'=>'RoleController@adminUpdate'
		]);

		Route::post('/{id}/delete',[
			'as'=>'delete',
			'uses'=>'RoleController@adminDelete'
		]);

	});

	Route::group(['prefix' => 'lincese', 'as' => 'lincese.'], function () {

		Route::get('/',[
					'as'=>'index',
					'uses'=>'LicenseController@adminIndex'
			]);

		// Route::prefix('type')->group(function(){

		// 	Route::get('/',[
		// 			'as'=>'type.index',
		// 			'uses'=>'QuestionTypeController@adminIndex'
		// 	]);

		// });

		// Route::prefix('rank')->group(function(){
		// 	Route::get('/',[
		// 			'as'=>'rank.index',
		// 			'uses'=>'LicenseRankController@adminIndex'
		// 	]);
		// });

	});