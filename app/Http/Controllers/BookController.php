<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Langsung connect database, bukan mode eloquent
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    public function viewadm()
    {
        //Mengambil data dari view database
        $katalog = DB::table('v_katalogbuku')->get();

        //Mengirim data ke admin-katalog, compact digunakan untuk mengirim data ke views
        return view('admin/admin-katalog', compact('katalog'));
    }

    public function addbook()
    {


        //Mengirim data ke admin-tambahbuku
        return view('admin/admin-tambahbuku');
    }

    public function storebook(Request $request)
    {
        try {
            // Insert data into database using DB facade
            DB::table('books')->insert([
                'title' => $request->title,
                'authorID' => $request->authorID,
                'publisherID' => $request->publisherID,
                'ISBN' => $request->ISBN,
                'genre' => $request->genre,
                'language' => $request->language,
                'publicationYear' => $request->year,
                'edition' => $request->edition,
                'pages' => $request->pages,
                'copiesAvailable' => $request->copies,
                'dateAdded' => now(),
                'syno' => $request->syno,
            ]);
    
            // Redirect back to the catalog page on success
            return redirect('/admin/katalog')->with('success', 'Book successfully added.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Gagal menambahkan buku, isi kembali sesuai intruksi dengan benar.');
        }
    }
    

    public function editbook()
    {
        //Mengambil data dari buku
        $buku = DB::table('books')->get();

        //Mengirim data ke admin-tambahbuku
        return view('admin/admin-tambahbuku', compact('buku'));
    }
}
