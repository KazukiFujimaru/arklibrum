<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrowBook(Request $request, $bookID)
    {
        //User id yang diambil adalah user id dari yang sudah terverifikasi login
        $userID = Auth::id();

        // Check if the user is already borrowing this book
        $existingBorrow = DB::table('borrows')
            ->where('id', $userID)
            ->where('bookID', $bookID)
            ->whereNull('returned_at')
            ->exists();

        if ($existingBorrow) {
            return response()->json(['message' => 'Buku sudah dipinjam'], 400);
        }

        // Check if there are available copies
        $book = DB::table('books')->where('bookID', $bookID)->first();

        if (!$book || $book->copiesAvailable < 1) {
            return response()->json(['message' => 'Tidak ada buku yang dapat dipinjam'], 400);
        }

        // Decrease available copies
        DB::table('books')
            ->where('bookID', $bookID)
            ->decrement('copiesAvailable');

        // Create a borrow record
        DB::table('borrows')->insert([
            'id' => $userID,
            'bookID' => $bookID,
            'borrowed_at' => now(),
        ]);

        return response()->json(['message' => 'Buku berhasil dipinjam.']);
    }

    public function returnBook(Request $request, $borrowID)
    {
        $userID = Auth::id();

        // Find the borrow record
        $borrow = DB::table('borrows')->where('borrowID', $borrowID)->first();

        //Pengecualian jika data diakses dari luar (tambahan dari AI)
        if (!$borrow || $borrow->id != $userID) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        // Mark the book as returned
        DB::table('borrows')
            ->where('borrowID', $borrowID)
            ->update(['returned_at' => now()]);

        // Increase available copies
        DB::table('books')
            ->where('bookID', $borrow->bookID)
            ->increment('copiesAvailable');

        return response()->json(['message' => 'Buku berhasil dikembalikan']);
    }
    public function viewborrow() {

        $pinjam = DB::table('v_borrow')->get();

        return view('pinjam-buku', compact('pinjam'));
    }
    public function addborrow()
    {
        return view('pinjam-tambah');
    }

    public function storeborrow(Request $request)
    {
        try {
            // Check if the user already has an active borrow for the same book
            $existingBorrow = DB::table('borrows')
                ->where('id', $request->id)
                ->where('bookID', $request->bookID)
                ->whereNull('returnedAt')
                ->first();
    
            if ($existingBorrow) {
                // If there's an existing borrow, redirect back with an error message
                return redirect()->back()->with('error', 'Anda sudah meminjam buku ini dan belum mengembalikannya.');
            }
    
            // Insert data into database using DB facade
            DB::table('borrows')->insert([
                'id' => $request->id, // assuming userID is retrieved from authenticated user
                'bookID' => $request->bookID,
                'borrowedAt' => now(),
            ]);

            // Decrement the copiesAvailable field in the books table
            DB::table('books')
            ->where('bookID', $request->bookID)
            ->decrement('copiesAvailable', 1);
    
            // Redirect back to the catalog page on success
            return redirect('pinjam')->with('success', 'Pinjam berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Gagal menambahkan pinjam, isi kembali sesuai intruksi dengan benar.');
        }
    }

    public function deleteborrow($id)
    {
        try {
            // Find the borrow record by ID and delete it
            $borrow = DB::table('borrows')->where('borrowID', $id)->first();
    
            if (!$borrow) {
                // If the borrow record does not exist, redirect back with an error message
                return redirect()->back()->with('error', 'Data pinjam tidak ditemukan.');
            }

            DB::table('books')
            ->where('bookID', $borrow->bookID)
            ->increment('copiesAvailable', 1);
    
            // Delete the borrow record
            DB::table('borrows')->where('borrowID', $id)->delete();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Pinjaman sudah dikembalikan.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Gagal menghapus data pinjam.');
        }
    }
    
    
}

