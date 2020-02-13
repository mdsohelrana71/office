<?php
Route::get('/', [
	'uses' => 'cmsController@CMS',
	'as'   => '/'
]);

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');






//admin panel route------------------------------------------------------

//Start category route
Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', [
		'uses' => 'HomeController@index',
		'as'   => '/home'
	]);

	Route::get('/add_member', [
		'uses' => 'AdminController@addMemberPage',
		'as'   => 'add_member'
	]);

	Route::post('/new_add_member', [
		'uses' => 'AdminController@addMember',
		'as'   => 'new_add_member'
	]);

	Route::post('/add_meal', [
		'uses' => 'AdminController@AddMeal',
		'as'   => 'add_meal'
	]);

	Route::post('/add_taka', [
		'uses' => 'AdminController@Addtakas',
		'as'   => 'add_taka'
	]);

	Route::get('/edit/{id}', [
		'uses' => 'AdminController@edit',
		'as'   => 'edit'
	]);

	Route::post('/update/{id}', [
		'uses' => 'AdminController@update',
		'as'   => 'update'
	]);

	Route::get('/delete_colum/{id}', [
		'uses' => 'AdminController@deleteColum',
		'as'   => 'delete_colum'
	]);

	Route::get('/delete/{id}', [
		'uses' => 'AdminController@delete',
		'as'   => 'delete'
	]);


	Route::get('/member_details/{id}', [
		'uses' => 'AdminController@memberDetails',
		'as'   => 'member_details'
	]);


	Route::get('/cost_list', [
		'uses' => 'AdminController@costList',
		'as'   => 'cost_list'
	]);

	Route::post('/new_add_cost', [
		'uses' => 'AdminController@newAddCost',
		'as'   => 'new_add_cost'
	]);


	Route::get('/cost_add', [
		'uses' => 'AdminController@costAdd',
		'as'   => 'cost_add'
	]);

	Route::get('/meal_rate', [
		'uses' => 'AdminController@mealRate',
		'as'   => 'meal_rate'
	]);

	Route::post('/add_others_costs', [
		'uses' => 'AdminController@othersCcosts',
		'as'   => 'add_others_costs'
	]);
	Route::get('/others_cost_list', [
		'uses' => 'AdminController@othersCostList',
		'as'   => 'others_cost_list'
	]);

	Route::get('/member_print/{id}', [
		'uses' => 'AdminController@memberPrint',
		'as'   => 'member_print'
	]);

	Route::get('/add_snack_view', [
		'uses' => 'AdminController@addSnackView',
		'as'   => 'add_snack_view'
	]);

	Route::post('/add_snack_cost', [
		'uses' => 'AdminController@addSnackCost',
		'as'   => 'add_snack_cost'
	]);

	Route::get('/snack_cost_list', [
		'uses' => 'AdminController@snackCostList',
		'as'   => 'snack_cost_list'
	]);

	Route::get('/total_cost', [
		'uses' => 'AdminController@totalCost',
		'as'   => 'total_cost'
	]);







	Route::get('/office', [
		'uses' => 'OfficeController@office',
		'as'   => 'office'
	]);
	Route::get('/add_employee', [
		'uses' => 'OfficeController@addEmployee',
		'as'   => 'add_employee'
	]);

	Route::post('/new_add_employee', [
		'uses' => 'OfficeController@newAddEmployee',
		'as'   => 'new_add_employee'
	]);
	Route::post('/add_intime', [
		'uses' => 'OfficeController@addIntime',
		'as'   => 'add_intime'
	]);
	Route::post('/add_outtime', [
		'uses' => 'OfficeController@addOutTime',
		'as'   => 'add_outtime'
	]);
	Route::get('/employee_edit/{id}', [
		'uses' => 'OfficeController@employeeEdit',
		'as'   => 'employee_edit'
	]);
	Route::post('/employee_update/{id}', [
		'uses' => 'OfficeController@employeeUpdate',
		'as'   => 'employee_update'
	]);
	Route::get('/employee_details/{id}', [
		'uses' => 'OfficeController@employeeDetails',
		'as'   => 'employee_details'
	]);
	Route::get('/edit_employee/{id}', [
		'uses' => 'OfficeController@editEmployee',
		'as'   => 'edit_employee'
	]);
	Route::post('/update_employee/{id}', [
		'uses' => 'OfficeController@updateEmployee',
		'as'   => 'update_employee'
	]);

	Route::get('/employee_present', [
		'uses' => 'OfficeController@employeePresent',
		'as'   => 'employee_present'
	]);
	Route::get('/add_employee_category_page', [
		'uses' => 'OfficeController@addEmployeeCategoryPage',
		'as'   => 'add_employee_category_page'
	]);
	Route::post('/add_employee_category', [
		'uses' => 'OfficeController@addNewEmployeeCategory',
		'as'   => 'add_employee_category'
	]);

	Route::get('/salary', [
		'uses' => 'OfficeController@salary',
		'as'   => 'salary'
	]);
	Route::get('/salary_inactive/{id}', [
		'uses' => 'OfficeController@salaryInactive',
		'as'   => 'salary_inactive'
	]);

	Route::get('/project', [
		'uses' => 'OfficeController@project',
		'as'   => 'project'
	]);

	Route::post('/add_project', [
		'uses' => 'OfficeController@addProject',
		'as'   => 'add_project'
	]);

	Route::get('/project_edit/{id}', [
		'uses' => 'OfficeController@projectEdit',
		'as'   => 'project_edit'
	]);
	Route::get('/project_details/{id}', [
		'uses' => 'OfficeController@projectDetails',
		'as'   => 'project_details'
	]);

	Route::get('/today_task', [
		'uses' => 'OfficeController@todayTask',
		'as'   => 'today_task'
	]);


    Route::get('/task_details/{id}', [
		'uses' => 'OfficeController@taskDetails',
		'as'   => 'task_details'
	]);


    Route::get('/members', [
		'uses' => 'OfficeController@members',
		'as'   => 'members'
	]);
    Route::get('/add_members', [
		'uses' => 'OfficeController@addMembers',
		'as'   => 'add_members'
	]);
    Route::post('/new_add_members', [
		'uses' => 'OfficeController@newAddMembers',
		'as'   => 'new_add_members'
	]);
	
    Route::get('/teams', [
		'uses' => 'OfficeController@teams',
		'as'   => 'teams'
	]);

    Route::get('/add_project_member', [
		'uses' => 'OfficeController@addProjectMember',
		'as'   => 'add_project_member'
	]);
    Route::post('/add_new_project_member', [
		'uses' => 'OfficeController@addNewProjectMember',
		'as'   => 'add_new_project_member'
	]);












	Route::get('/work', [
		'uses' => 'cmsController@work',
		'as'   => 'work'
	]);
	
	Route::post('/add_work', [
		'uses' => 'cmsController@addWork',
		'as'   => 'add_work'
	]);
	Route::get('/work_view', [
		'uses' => 'cmsController@workView',
		'as'   => 'work_view'
	]);



});