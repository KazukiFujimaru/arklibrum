<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Langsung connect database, bukan mode eloquent
use Illuminate\Validation\ValidationException;

class AuthorController extends Controller
{
    public function viewadm()
    {
        //Mengambil data dari view database
        $author = DB::table('authors')->get();

        //Mengirim data ke admin-author, compact digunakan untuk mengirim data ke views
        return view('admin/admin-author', compact('author'));
    }

    public function addauthor()
    {
        //Mengirim data ke admin-tambahauthor
        return view('admin/admin-tambahauthor');
    }

    public function storeauthor(Request $request)
    {
        try {
            // Insert data into database using DB facade
            DB::table('authors')->insert([
                'name' => $request->name,
                'description' => $request->desc,
            ]);
    
            // Redirect back to the catalog page on success
            return redirect('/admin/author')->with('success', 'Author berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Gagal menambahkan author, isi kembali sesuai intruksi dengan benar.');
        }
    }
    
    public function editauthor($id)
    {
        $dataauthor = DB::table('authors')->where('authorID', $id)->first();
        
        return view('admin/admin-editauthor', compact('dataauthor'));
    }

    public function updateauthor(Request $request, $id)
    {
        try {
            // Insert data into database using DB facade
            DB::table('authors')->where('authorID', $id)->update([
                'name' => $request->name,
                'description' => $request->desc,
            ]);
    
            // Redirect back to the catalog page on success
            return redirect('/admin/author')->with('success', 'Author berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Gagal mengubah data author, isi kembali sesuai intruksi dengan benar.');
        }
    }
    public function deleteauthor($id) 
    {
        DB::table('authors')->where('authorID', $id)->delete();
    
        return redirect('/admin/author')->with('success', 'Data author berhasil dihapus.');
    }
}

