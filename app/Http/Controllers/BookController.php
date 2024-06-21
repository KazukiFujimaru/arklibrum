<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Langsung connect database, bukan mode eloquent

class BookController extends Controller
{
    public function viewadm()
    {
        //Mengambil data dari view database
        $katalog = DB::table('v_katalogbuku')->get();

        //Mengirim data ke admin-katalog, compact digunakan untuk mengirim data ke views
        return view('admin/admin-katalog', compact('katalog'));
    }
}
