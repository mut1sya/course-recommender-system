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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('student')->group(function () {
    Route::get('/register', 'Auth\Student\StudentRegisterController@showRegistrationForm')->name('student.register');
    Route::post('/register', 'Auth\Student\StudentRegisterController@register')->name('student.register.submit');
    Route::get('/login', 'Auth\Student\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Auth\Student\StudentLoginController@login')->name('student.login.submit');
    Route::get('/', 'HomeController@studentIndex')->name('student.dashboard');
    Route::get('/profile', 'Student\StudentController@showProfile')->name('student.showProfile');
    Route::get('/editProfile', 'Student\StudentController@editProfile')->name('student.editProfile');
    Route::post('/editProfile', 'Student\StudentController@updateProfile')->name('student.editProfile.submit');
    Route::post('/editPassword', 'Student\StudentController@updatePassword')->name('student.editPassword.submit');
    

});
Route::Resource('student', 'Student\StudentController');

Route::prefix('researcher')->group(function() {
	Route::get('/register', 'Auth\Researcher\ResearcherRegisterController@showRegistrationForm')->name('researcher.register');
	Route::post('/register', 'Auth\Researcher\ResearcherRegisterController@register')->name('researcher.register.submit');
	Route::get('/login', 'Auth\Researcher\ResearcherLoginController@showLoginForm')->name('researcher.login');
	Route::post('/login', 'Auth\Researcher\ResearcherLoginController@login')->name('researcher.login.submit');
	Route::get('/', 'HomeController@researcherIndex')->name('researcher.dashboard');
	Route::get('/create', 'Researcher\ResearcherController@create')->name('researcher.create');
	Route::post('/', 'Researcher\ResearcherController@store')->name('researcher.store');
	Route::get('/profile', 'Researcher\ResearcherController@showProfile')->name('researcher.showProfile');
    Route::get('/editProfile', 'Researcher\ResearcherController@editProfile')->name('researcher.editProfile');
    Route::post('/editProfile', 'Researcher\ResearcherController@updateProfile')->name('researcher.editProfile.submit');
    Route::post('/editPassword', 'Researcher\ResearcherController@updatePassword')->name('researcher.editPassword.submit');
    Route::Resource('course', 'CourseController');

});

Route::prefix('verifier')->group(function() {
	Route::get('/register', 'Auth\Verifier\VerifierRegisterController@showRegistrationForm')->name('verifier.register');
	Route::post('/register', 'Auth\Verifier\VerifierRegisterController@register')->name('verifier.register.submit');
	Route::get('/login', 'Auth\Verifier\VerifierLoginController@showLoginForm')->name('verifier.login');
	Route::post('/login', 'Auth\Verifier\VerifierLoginController@login')->name('verifier.login.submit');
	Route::get('/', 'HomeController@verifierIndex')->name('verifier.dashboard');
	Route::get('/create', 'Verifier\VerifierController@create')->name('verifier.create');
	Route::post('/', 'Verifier\VerifierController@store')->name('verifier.store');
	Route::get('/profile', 'Verifier\VerifierController@showProfile')->name('verifier.showProfile');
    Route::get('/editProfile', 'Verifier\VerifierController@editProfile')->name('verifier.editProfile');
    Route::post('/editProfile', 'Verifier\VerifierController@updateProfile')->name('verifier.editProfile.submit');
    Route::post('/editPassword', 'Verifier\VerifierController@updatePassword')->name('verifier.editPassword.submit');
    Route::get('/course', 'Verifier\VerifierController@showPendingCourses')->name('verifier.pendingCourses');
    Route::get('/course/{course}', 'Verifier\VerifierController@approveCourse')->name('verifier.approveCourse');
    Route::get('/courseApproved/{course}', 'Verifier\VerifierController@approved')->name('verifier.approved');

});