<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Langsung connect database, bukan mode eloquent
use Illuminate\Validation\ValidationException;

class PublisherController extends Controller
{
    public function viewadm()
    {
        //Mengambil data dari view database
        $publisher = DB::table('publishers')->get();

        //Mengirim data ke admin-publisher, compact digunakan untuk mengirim data ke views
        return view('admin/admin-publisher', compact('publisher'));
    }

    public function addpublisher()
    {
        //Mengirim data ke admin-tambahpublisher
        return view('admin/admin-tambahpublisher');
    }

    public function storepublisher(Request $request)
    {
        try {
            // Insert data into database using DB facade
            DB::table('publishers')->insert([
                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'contact' => $request->contact,
            ]);
    
            // Redirect back to the catalog page on success
            return redirect('/admin/publisher')->with('success', 'Publisher berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Gagal menambahkan publisher, isi kembali sesuai intruksi dengan benar.');
        }
    }

    public function editpublisher($id)
    {
        $datapublisher = DB::table('publishers')->where('publisherID', $id)->first();
        
        return view('admin/admin-editpublisher', compact('datapublisher'));
    }

    public function updatepublisher(Request $request, $id)
    {
        try {
            // Insert data into database using DB facade
            DB::table('publishers')->where('publisherID', $id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'contact' => $request->contact,
            ]);
    
            // Redirect back to the catalog page on success
            return redirect('/admin/publisher')->with('success', 'Publisher berhasil diperbarui.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Gagal mengubah data publisher, isi kembali sesuai intruksi dengan benar.');
        }
    }

    public function deletepublisher($id) 
    {
        DB::table('publishers')->where('publisherID', $id)->delete();
    
        return redirect('/admin/publisher')->with('success', 'Data publisher berhasil dihapus.');
    }
}
