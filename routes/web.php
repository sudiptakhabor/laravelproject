<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Article Routes
Route::get('/articles', 'ArticlesController@index');
Route::get('/article/category/{id}', 'ArticlesController@category');
Route::get('/article/{id}', 'ArticlesController@show');




// Comment Route
Route::post('/article/comment', 'CommentController@store')->name('user.comment.store');
// Requirement Route
Route::get('/requirement', 'RequirementController@index');

// Author Routes
Route::get('/authors', 'AuthorController@index');
Route::get('/author/{id}', 'AuthorController@show');
Route::get('/article/vote/{id}', 'VoteController@vote');


// Search Route
Route::get('/search', 'SearchController@index');

// Contact Route
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@sendMail');

//Instruction
Route::view('/instruction', 'instruction');

//Overview
Route::view('/overview', 'overview');

//help
Route::view('/help', 'help');

//Policy
Route::view('/policy', 'policy');

//about added by dipanshu
Route::view('/about', 'about');


// Auth Routes
Auth::routes();

// Auth Common Routes
Route::group(['middleware' => 'auth'], function()
{
    // Dashboard Route
    //Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
    Route::get('/approval', 'Admin\DashboardController@approval')->name('approval');
    
    Route::middleware(['approved'])->group(function () {
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
    });
    
});

// Admin Routes
Route::group(['prefix' => 'dashboard/admin', 'middleware' => ['auth', 'isAdmin']], function()
{
    // Article Routes
    Route::resource('article-category', 'Admin\ArticleCategoryController');
    Route::get('article/approve', 'Admin\ArticleController@approve')->name('article.approve');
    Route::get('article/pending', 'Admin\ArticleController@pending')->name('article.pending');
    Route::get('article/reject', 'Admin\ArticleController@reject')->name('article.reject');
    Route::post('article', 'Admin\ArticleController@store')->name('article.store');
    Route::put('article/{id}', 'Admin\ArticleController@update')->name('article.update');
    Route::delete('article/{id}', 'Admin\ArticleController@destroy')->name('article.destroy');

    // Issue Routes
    Route::get('issue/{id}', 'Admin\ArticleIssueController@index')->name('issue.index');
    Route::post('issue', 'Admin\ArticleIssueController@store')->name('issue.store');
    Route::put('issue/{id}', 'Admin\ArticleIssueController@update')->name('issue.update');
    Route::delete('issue/{id}', 'Admin\ArticleIssueController@destroy')->name('issue.destroy');


    Route::resource('requirement', 'Admin\RequirementController');
    
    Route::middleware(['admin'])->group(function () {
        
        Route::resource('reviewer', 'Admin\ReviewerController');
        
        Route::get('/reviewer/{user_id}/approve', 'Admin\ReviewerController@approve')->name('admin.reviewer.approve');
    });
    
    Route::resource('author', 'Admin\AuthorController');
    
    Route::resource('author', 'Admin\AuthorController');
    
    
    
    Route::middleware(['admin'])->group(function () {
        
        Route::resource('editor', 'Admin\EditorController');
        
        Route::get('/editor/{user_id}/approve', 'Admin\EditorController@approve')->name('admin.editor.approve');
    });
    
    
    Route::middleware(['admin'])->group(function () {
        
        Route::resource('publisher', 'Admin\PublisherController');
        
        Route::get('/publisher/{user_id}/approve', 'Admin\PublisherController@approve')->name('admin.publisher.approve');
    });

    // Comment Route
    Route::resource('comment', 'Admin\CommentController');
    // Profile Route
    Route::resource('profile', 'Admin\ProfileController');

    // Setting Routes
    Route::get('setting', 'Admin\SettingController@index')->name('setting.index');
    Route::post('siteinfo', 'Admin\SettingController@siteInfo')->name('setting.siteinfo');
    Route::post('contactinfo', 'Admin\SettingController@contactInfo')->name('setting.contactinfo');
    Route::post('socialinfo', 'Admin\SettingController@socialInfo')->name('setting.socialinfo');
    Route::post('changepass', 'Admin\SettingController@changePass')->name('setting.changepass');
    
    Route::post('userrole', 'Admin\UserRoleController@store')->name('userrole.store');
});
//---test----------------//

Route::get('dashboard/reviewer/article/approve2/{id}', 'Reviewer\ArticleController@approve2');
Route::get('dashboard/reviewer/article/completed', 'Reviewer\ArticleController@completed')->name('reviewer.article.completed');
Route::get('dashboard/reviewer/article/view/{id}', 'Reviewer\ArticleController@view')->name('reviewer.article.view');
Route::get('dashboard/reviewer/article/approve3', 'Reviewer\ArticleController@approve3')->name('reviewer.article.approve3');
Route::post('dashboard/reviewer/article/approve4', 'Reviewer\ArticleController@store_review')->name('reviewer.article.review');
 


//test----ends-----//

 //Route::get('dashboard/reviewer/article/approve', 'Reviewer\ArticleController@approve');
 
// Reviewer Routes
Route::group(['prefix' => 'dashboard/reviewer', 'as'=>'reviewer.', 'middleware' => ['auth', 'isReviewer', 'approved']], function()
{
    // Article Routes
    Route::resource('article', 'Reviewer\ArticleController');
    Route::get('articles', 'Reviewer\ArticleController@index')->name('article.index');
    Route::get('published', 'Reviewer\ArticleController@published')->name('published');
   // Route::get('article/approve2', 'Reviewer\ArticleController@approve2');
    Route::get('article/approve', 'Reviewer\ArticleController@approve')->name('article.approve');
    Route::get('article/pending', 'Reviewer\ArticleController@pending')->name('article.pending');
    Route::get('article/reject', 'Reviewer\ArticleController@reject')->name('article.reject');
    Route::post('article', 'Reviewer\ArticleController@store')->name('article.store');
    Route::put('article/{id}', 'Reviewer\ArticleController@update')->name('article.update');
    Route::delete('article/{id}', 'Reviewer\ArticleController@destroy')->name('article.destroy');

    // Issue Routes
    Route::get('issue/{id}', 'Reviewer\ArticleIssueController@index')->name('issue.index');
    Route::post('issue', 'Reviewer\ArticleIssueController@store')->name('issue.store');
    Route::put('issue/{id}', 'Reviewer\ArticleIssueController@update')->name('issue.update');
    Route::delete('issue/{id}', 'Reviewer\ArticleIssueController@destroy')->name('issue.destroy');
    
    //history
    Route::get('history', 'Reviewer\ArticleController@history')->name('history');


    // Profile Route
    Route::resource('profile', 'Reviewer\ProfileController');
});


// Author Routes
Route::group(['prefix' => 'dashboard/author', 'as'=>'author.', 'middleware' => ['auth', 'isAuthor']], function()
{
    // Article Routes
    Route::resource('article', 'Author\ArticleController');
    Route::get('published', 'Author\ArticleController@published')->name('published');

    // Issue Routes
    Route::resource('issue', 'Author\ArticleIssueController');
    
    //history
    Route::get('history', 'Author\ArticleController@history')->name('history');

    // Profile Route
    Route::resource('profile', 'Author\ProfileController');
});


// Editor Routes
Route::group(['prefix' => 'dashboard/editor', 'as'=>'editor.', 'middleware' => ['auth', 'isEditor', 'approved']], function()
{
    // Article Routes
    Route::resource('article', 'Editor\ArticleController');
    Route::get('published', 'Editor\ArticleController@published')->name('published');

    // Issue Routes
    Route::resource('issue', 'Editor\ArticleIssueController');
    
    //history
    Route::get('history', 'Editor\ArticleController@history')->name('history');

    // Profile Route
    Route::resource('profile', 'Editor\ProfileController');
});


// Publisher Routes
Route::group(['prefix' => 'dashboard/publisher', 'as'=>'publisher.', 'middleware' => ['auth', 'isPublisher', 'approved']], function()
{
    // Article Routes
    Route::resource('article', 'Publisher\ArticleController');
    Route::get('published', 'Publisher\ArticleController@published')->name('published');

    // Issue Routes
    Route::resource('issue', 'Publisher\ArticleIssueController');
    
    //history
    Route::get('history', 'Publisher\ArticleController@history')->name('history');
    
    

    // Profile Route
    Route::resource('profile', 'Publisher\ProfileController');
});

Route::post('api/fetch-states', 'DropdownController@fetchState');
Route::post('api/fetch-cities', 'DropdownController@fetchCity');



