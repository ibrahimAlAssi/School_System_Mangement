<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sections\SectionsController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\StudentController as StudentsStudentController;
use App\Http\Controllers\Subjects\SubjectsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
// Auth::routes();
Route::get('/', 'HomeController@index')->name('selection');
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}', 'LoginController@loginForm')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        //===============================================Grades====================================================
        Route::resource('Grades', 'GradeController');
        //===============================================Classrooms================================================
        Route::group(['namespace' => 'Classrooms'], function () {
            Route::resource('Classrooms', 'ClassroomController');
            Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
            Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');
        });
        Route::group(['namespace' => 'Sections'], function () {
            Route::resource('Sections', 'SectionsController');
            Route::get('/classes/{id}', [SectionsController::class, 'getclasses'])->name('getclasses');
        });
        Route::group(['namespace' => 'Teachers'], function () {
            Route::resource('Teachers', 'TeacherController');
        });

        //===============================================Students================================================
        Route::group(['namespace' => 'Students'], function () {
            Route::resource('Students', 'StudentController');
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
            Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
            Route::resource('receipt_students', 'ReceiptStudentsController');
            Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
            Route::get('Show_Attachement/{studentName}/{filename}', 'StudentController@Show_Attachement');
            Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
            Route::resource('Promotion', 'PromotionController');
            Route::resource('Graduated', 'GraduatedController');
            Route::post('GraduateOneStudent', [StudentsStudentController::class, 'Graduated_one_student'])->name('GraduateOneStudent'); //in index Student
            Route::resource('Fees', 'FeesController');
            Route::resource('Fees_Invoices', 'FeesInvoicesController');
            Route::resource('ProcessingFee', 'ProcessingFeeController');
            Route::resource('Payment_students', 'PaymentController');
            Route::resource('Attendance', 'AttendanceController');
            Route::resource('online_classes', 'OnlineClasseController');
            Route::get('indirect_admin', 'OnlineClasseController@indirectCreate')->name('indirect.create.admin');
            Route::post('indirect_admin', 'OnlineClasseController@storeIndirect')->name('indirect.store.admin');
            Route::resource('library', 'LibraryController');
            Route::post('download_file_library\{filename}', 'LibraryController@downloadAttachment')->name('download_file_library');
        });
        //===============================================add_parent================================================
        Route::view('add_parent', 'livewire.show_Form')->name('add_parent');
        //===============================================Subjects================================================
        Route::group(['namespace' => 'Subjects'], function () {
            Route::resource('subjects', 'SubjectsController');
        });
        //===============================================Quizzes================================================

        Route::group(['namespace' => 'Quizzes'], function () {
            Route::resource('Quizzes', 'QuizzController');
        });
        Route::group(['namespace' => 'Questions'], function () {
            Route::resource('questions', 'QuestionController');
        });
        //==============================Setting============================
        Route::group(['namespace' => 'Setting'], function () {
            Route::resource('settings', 'SettingController');
        });
    }
);
