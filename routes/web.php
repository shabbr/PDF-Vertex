<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MoreController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/test',[SearchController::class,'test'])->name('home');
Route::post('/try',[SearchController::class,'try'])->name('try');
// zotero api key
// oe8YgpGbNxjB9C8vAEZrw8Vn

Route::controller(SearchController::class)->group(function () {
Route::get('/{lang?}','homePage')->where('lang', 'pu|es')->name('home');

 Route::post('/search/{projectId}','searchUrl')->name('search');
 Route::post('/searchData','searchData')->name('searchData');
Route::post('/showForm/{projectId}','showForm')->name('showForm');
 Route::post('/submitDetails','submitDetails')->name('submitDetails');
 Route::get('/citationEdit/{id}/{projectId}','citationEdit')->name('citationEdit');
 Route::post('/editCitation/{id}/{projectId}','editCitation')->name('editCitation');
 Route::get('/citationDelete/{id}','citationDelete')->name('citationDelete');
 Route::post('/newProject','newProject')->name('newProject');
 Route::get('/openProject/{projectId}','openProject')->name('openProject');
 Route::get('/editPojectName/{projectId}','editPojectName')->name('editPojectName');
 Route::post('/renameProject', 'renameProject')->name('renameProject');

 Route::post('/updateProjectName/{projectId}','updateProjectName')->name('updateProjectName');
 Route::get('/archieveProject/{projectId}','archieveProject')->name('archieveProject');
 Route::get('/restoreArchieveProject/{projectId}','restoreArchieveProject')->name('restoreArchieveProject');
 Route::get('/showArchieveProject','showArchieveProject')->name('showArchieveProject');

 Route::get('/deletePoject/{projectId}','deletePoject')->name('deletePoject');
 Route::get('/deletedProjects','deletedProjects')->name('deletedProjects');
 Route::get('/restoreProject/{projectId}','restoreProject')->name('restoreProject');
 Route::get('/permanentDeleteProject/{projectId}','permanentDeleteProject')->name('permanentDeleteProject');
 Route::get('/mergeProject/{projectId}','mergeProject')->name('mergeProject');
 Route::post('/merge','merge')->name('merge');
 Route::get('/duplicate/{projectId}','duplicate')->name('duplicate');


 Route::get('/downloadImage','downloadImage')->name('downloadImage');
 Route::post('/risCitation','risCitation')->name('risCitation');
 Route::post('/bibCitation','bibCitation')->name('bibCitation');
 Route::post('/citationFile','citationFile')->name('citationFile');

 Route::get('/showContactForm','showContactForm')->name('showContactForm');
 Route::get('/notificationForm','notificationForm')->name('notificationForm');
 Route::post('/notification','notification')->name('notification');
 Route::get('/showNotification','showNotification')->name('showNotification');
 Route::get('/notificationBlog/{notificationId}','notificationBlog')->name('notificationBlog');

 Route::get('/dashboard', 'homePage')->middleware(['auth', 'verified'])->name('dashboard');

});

Route::prefix('Book')->group(function(){
    Route::controller(BookController::class)->group(function () {
        Route::post('/searchBook', 'searchBook')->name('searchBook');
 Route::post('/showBookForm','showBookForm')->name('showBookForm');
 Route::post('/submitBookForm','submitBookForm')->name('submitBookForm');


    });
});

Route::prefix('Article')->group(function (){
    Route::controller(ArticleController::class)->group(function () {
        Route::post('/searchGoogleScholar', 'searchGoogleScholar')->name('searchGoogleScholar');
 Route::post('/showArticleForm','showArticleForm')->name('showArticleForm');
 Route::post('/submitArticleForm','submitArticleForm')->name('submitArticleForm');

    });
});


Route::prefix('Video')->group(function (){
    Route::controller(VideoController::class)->group(function () {
        Route::post('/video', 'video')->name('video');
        Route::post('/showVideoForm/{projectId}','showVideoForm')->name('showVideoForm');
        Route::post('/submitVideoForm','submitVideoForm')->name('submitVideoForm');
    });
});



Route::controller(MoreController::class)->group(function () {
Route::get('/forms','forms')->name('forms');
Route::post('/artist', 'artist')->name('artist');
Route::post('/illustrator','illustrator')->name('illustrator');
Route::post('/regulation','regulation')->name('regulation');
Route::post('/postAuthor','postAuthor')->name('postAuthor');
Route::post('/interview','interview')->name('interview');
Route::post('/reportAuthor','reportAuthor')->name('reportAuthor');
Route::post('/bill','bill')->name('bill');
Route::post('/song','song')->name('song');
Route::post('/case','case')->name('case');
Route::post('/speech','speech')->name('speech');
Route::post('/conference','conference')->name('conference');
Route::post('/Article','Article')->name('Article');
Route::post('/magzine','magzine')->name('magzine');

Route::post('/thesis','thesis')->name('thesis');
Route::post('/Legislation','Legislation')->name('Legislation');
Route::post('/Dictionary','Dictionary')->name('Dictionary');
Route::post('/map','Map')->name('Map');
Route::post('/broadcast','broadcast')->name('broadcast');
Route::post('/bookForm','bookForm')->name('bookForm');
Route::post('/book','book')->name('book');
Route::post('/NewsArticle','NewsArticle')->name('NewsArticle');
Route::post('/Encyclopedia','Encyclopedia')->name('Encyclopedia');
Route::post('/Movie','Movie')->name('Movie');
Route::post('/Communication','Communication')->name('Communication');
Route::post('/Book','Book')->name('Book');
Route::post('/MagzineArticle','MagzineArticle')->name('MagzineArticle');
Route::post('/Patent','Patent')->name('Patent');
Route::post('/Review','Review')->name('Review');
Route::post('/Standard','Standard')->name('Standard');
Route::post('/Video','Video')->name('Video');
Route::post('/Website','Website')->name('Website');
Route::post('/Citation','Citation')->name('Citation');
Route::post('/Image','Image')->name('Image');












});


    Route::controller(LanguageController::class)->group(function () {
        Route::get('/language/{lang}', 'language')->name('language');
    });

     Route::controller(ToolController::class)->group(function () {
        Route::get('/tool','tool')->name('tool');
     });

     
Route::post('/send-mail',[MailController::class,'contactMail'])->name('contactMail');
Route::post('/first-mail',[MailController::class,'mailtrap'])->name('mailtrap');
Route::post('/second-mail',[MailController::class,'testing'])->name('testing');

 Route::post('/youtube',[YoutubeController::class,'youtube'])->name('youtube');

Route::controller(PagesController::class)->group(function () {
    Route::get('/privacyPolicy','privacyPolicy')->name('privacyPolicy');
    Route::get('/terms','terms')->name('terms');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';
