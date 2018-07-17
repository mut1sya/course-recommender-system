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
    Route::get('/complaint', 'Student\StudentController@showComplaints')->name('student.showComplaint');
    Route::post('/complaint', 'Student\StudentController@storeComplaint')->name('student.complaint.add');
    Route::get('/editProfile', 'Student\StudentController@editProfile')->name('student.editProfile');
    Route::post('/editProfile', 'Student\StudentController@updateProfile')->name('student.editProfile.submit');
    Route::post('/editPassword', 'Student\StudentController@updatePassword')->name('student.editPassword.submit');
    Route::get('/search', 'Student\StudentController@showSearch')->name('student.search');
    Route::post('/search', 'Student\StudentController@search')->name('student.search.submit');
    Route::get('/course/{course}', 'Student\StudentController@viewCourse')->name('student.viewCourse');
    Route::post('/course/rate', 'Student\StudentController@rateCourse')->name('student.rate.submit');
    Route::post('/course/edit/rate', 'Student\StudentController@editRating')->name('student.rate.edit.submit');
    Route::get('/recommended/Courses/', 'Student\StudentController@recommendedCourses')->name('student.recommendedCourses');
    

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
    Route::get('/complaint', 'Researcher\ResearcherController@showComplaints')->name('researcher.showComplaint');
    Route::post('/complaint', 'Researcher\ResearcherController@storeComplaint')->name('researcher.complaint.add');
    Route::get('/editProfile', 'Researcher\ResearcherController@editProfile')->name('researcher.editProfile');
    Route::post('/editProfile', 'Researcher\ResearcherController@updateProfile')->name('researcher.editProfile.submit');
    Route::post('/editPassword', 'Researcher\ResearcherController@updatePassword')->name('researcher.editPassword.submit');
    Route::Resource('course', 'CourseController');
    Route::get('/course', 'Researcher\ResearcherController@myCourses')->name('course.index');
    Route::get('/course/create', 'Researcher\ResearcherController@courseCreate')->name('course.create');
    Route::post('/course', 'Researcher\ResearcherController@courseStore')->name('course.store');
    Route::get('/search', 'Researcher\ResearcherController@showSearch')->name('researcher.search');
    Route::post('/search', 'Researcher\ResearcherController@search')->name('researcher.search.submit');
    Route::post('deleteCourse', 'Researcher\ResearcherController@decline')->name('researcher.deleteCourse');
    Route::post('/viewCourse', 'Researcher\ResearcherController@viewCourse')->name('researcher.viewCourse');
    Route::post('/setPendingCourse', 'Researcher\ResearcherController@setPendingCourse')->name('researcher.setPendingCourse');
    Route::get('/viewPendingCourse/{course}', 'Researcher\ResearcherController@viewPendingCourse')->name('researcher.viewPendingCourse');
    Route::post('/edit/pendingCourse','Researcher\ResearcherController@editPendingCourse')->name('researcher.editPendingCourse');
    Route::post('edit/pendingCourse/save', 'Researcher\ResearcherController@updatePendingCourse')->name('researcher.updatePendingCourse');
    Route::post('/course/addcomment', 'Researcher\ResearcherController@addComment')->name('researcher.addComment');
    Route::get('/rules', 'Researcher\ResearcherController@viewRules')->name('researcher.rules');

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
    Route::get('/complaint', 'Verifier\VerifierController@showComplaints')->name('verifier.showComplaint');
    Route::post('/complaint', 'Verifier\VerifierController@storeComplaint')->name('verifier.complaint.add');
    Route::get('/editProfile', 'Verifier\VerifierController@editProfile')->name('verifier.editProfile');
    Route::post('/editProfile', 'Verifier\VerifierController@updateProfile')->name('verifier.editProfile.submit');
    Route::post('/editPassword', 'Verifier\VerifierController@updatePassword')->name('verifier.editPassword.submit');
    Route::get('/course', 'Verifier\VerifierController@showPendingCourses')->name('verifier.pendingCourses');
    Route::get('/course/verifying', 'Verifier\VerifierController@myVerifyingCourses')->name('verifier.verifying');
    Route::get('/course/verifying/{course}', 'Verifier\VerifierController@showVerifying')->name('verifier.showVerifying');
    Route::post('/course/verify', 'Verifier\VerifierController@verify')->name('verifier.approveCourse');
    Route::post('/course/addcomment', 'Verifier\VerifierController@addComment')->name('verifier.addComment');
    Route::get('/courseApproved/{course}', 'Verifier\VerifierController@approved')->name('verifier.approved');
    Route::post('/course/save', 'Verifier\VerifierController@save')->name('verifier.saveCourse');
    Route::post('/course/decline', 'Verifier\VerifierController@decline')->name('verifier.declineCourse');
    Route::get('/rules', 'Verifier\VerifierController@viewRules')->name('verifier.rules');
});

Route::prefix('admin')->group(function() {
    Route::get('/', 'HomeController@adminIndex')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@showProfile')->name('admin.showProfile');
    Route::get('/editProfile', 'AdminController@editProfile')->name('admin.editProfile');
    Route::post('/editProfile', 'AdminController@updateProfile')->name('admin.editProfile.submit');
    Route::post('/editPassword', 'AdminController@updatePassword')->name('admin.editPassword.submit');
    Route::get('/verifier', 'AdminController@pendingVerifiers')->name('admin.pendingVerifiers');
    Route::post('/verifier/verify', 'AdminController@verify')->name('admin.approveVerifier');
    Route::get('/verifier/verifying/{course}', 'AdminController@showVerifier')->name('admin.showVerifier');
    Route::get('/add', 'AdminController@showAdminForm')->name('admin.add');
    Route::post('/add', 'AdminController@addAdmin')->name('admin.add.store');
    Route::get('/complaints', 'AdminController@viewComplaints')->name('admin.viewComplaints');
    Route::get('/complaints/reply/{complaint}', 'AdminController@reply')->name('admin.reply');
    Route::Post('/response', 'AdminController@saveResponse')->name('admin.response.add');
    Route::get('/industries', 'AdminController@viewIndustries')->name('admin.industries.view');
    Route::post('/industries', 'AdminController@addIndustry')->name('admin.industry.add');
    Route::post('/industries/delete', 'AdminController@deleteIndustry')->name('admin.industry.delete');
    Route::post('/industries/edit', 'AdminController@editIndustry')->name('admin.industry.edit');
    Route::get('/researcher/rules', 'AdminController@viewResearcherRules')->name('admin.researcherRules.view');
    Route::post('/researcher/rules', 'AdminController@addResearcherRules')->name('admin.researcherRule.add');
    Route::post('/researcher/rules/edit', 'AdminController@editResearcherRules')->name('admin.researcherRule.edit');
    Route::post('/researcher/rule/delete', 'AdminController@deleteResearcherRules')->name('admin.researcherRule.delete');
    Route::get('/verifier/rules', 'AdminController@viewVerifierRules')->name('admin.verifierRules.view');
    Route::post('/verifier/rules', 'AdminController@addVerifierRules')->name('admin.verifierRule.add');
    Route::post('/verifier/rules/edit', 'AdminController@editVerifierRules')->name('admin.verifierRule.edit');
    Route::post('/verifier/rule/delete', 'AdminController@deleteVerifierRules')->name('admin.verifierRule.delete');
});