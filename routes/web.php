<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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


// Route Template :

//Route untuk login user
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');

	//Route katalog
	Route::get('katalog-buku', [BookController::class, 'viewuser'])->name('katalog-buku');;

	//Route detail buku
	Route::get('detail-buku/{id}', [BookController::class, 'bookdetail'])->name('detail-buku');
});


//Route sebelum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

// Route untuk admin :
Route::group(['middleware' => ['admin']], function () {
	Route::get('admin/dashboard', function () {
		return view('admin/admin-dashboard');
	})->name('admin-dashboard');

	//Route atur author
	Route::get('admin/author', [AuthorController::class, 'viewadm'])->name('admin.author');
	Route::get('admin/tambah-author', [AuthorController::class, 'addauthor'])->name('admin.tambahauthor');
	Route::post('admin/simpan-author', [AuthorController::class, 'storeauthor'])->name('admin.simpanauthor');
	Route::get('admin/edit-author/{id}', [AuthorController::class, 'editauthor'])->name('admin.editauthor');
	Route::post('admin/update-author/{id}', [AuthorController::class, 'updateauthor'])->name('admin.updateauthor');
	Route::get('admin/hapus-author/{id}', [AuthorController::class, 'deleteauthor'])->name('admin.hapusauthor');
	
	//Route atur publisher
	Route::get('admin/publisher', [PublisherController::class, 'viewadm'])->name('admin.publisher');
	Route::get('admin/tambah-publisher', [PublisherController::class, 'addpublisher'])->name('admin.tambahpublisher');
	Route::post('admin/simpan-publisher', [PublisherController::class, 'storepublisher'])->name('admin.simpanpublisher');
	Route::get('admin/edit-publisher/{id}', [PublisherController::class, 'editpublisher'])->name('admin.editpublisher');
	Route::post('admin/update-publisher/{id}', [PublisherController::class, 'updatepublisher'])->name('admin.updatepublisher');
	Route::get('admin/hapus-publisher/{id}', [PublisherController::class, 'deletepublisher'])->name('admin.hapuspublisher');

	//Route katalog buku
	Route::get('admin/katalog', [BookController::class, 'viewadm'])->name('admin.katalog');
	Route::get('admin/tambah-buku', [BookController::class, 'addbook'])->name('admin.tambahbuku');
	Route::post('admin/simpan-buku', [BookController::class, 'storebook'])->name('admin.simpanbuku');
	Route::get('admin/edit-buku/{id}', [BookController::class, 'editbook'])->name('admin.editbuku');
	//Ditambah {id} untuk mendapatkan id
	Route::post('admin/update-buku/{id}', [BookController::class, 'updatebook'])->name('admin.updatebuku');
	Route::get('admin/hapus-buku/{id}',[BookController::class, 'deletebook'])->name('admin.hapusbuku');

	Route::get('admin/akun', function () {
		return view('admin/admin-akun');
	})->name('admin-akun');

	Route::get('admin/test', function () {
		return view('welcome');
	});
});