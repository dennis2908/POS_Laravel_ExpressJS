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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'web'], function(){
   Route::get('user/profil', 'UserController@profil')->name('user.profil');
   Route::patch('user/{id}/change', 'UserController@changeProfil');
});

Route::group(['middleware' => ['web', 'cekuser:1' ]], function(){
   Route::get('kategori/data', 'KategoriController@listData')->name('kategori.data');
   Route::resource('kategori', 'KategoriController');

   Route::get('produk/data', 'ProdukController@listData')->name('produk.data');
   Route::post('produk/hapus', 'ProdukController@deleteSelected');
   Route::post('produk/cetak', 'ProdukController@printBarcode');
   Route::resource('produk', 'ProdukController');
   
   Route::get('user/data', 'UserController@listData')->name('user.data');
   Route::resource('user', 'UserController');

   Route::get('penjualan/data', 'PenjualanController@listData')->name('penjualan.data');
   Route::get('penjualan/{id}/lihat', 'PenjualanController@show');
   Route::resource('penjualan', 'PenjualanController');

   Route::resource('setting', 'SettingController');
});