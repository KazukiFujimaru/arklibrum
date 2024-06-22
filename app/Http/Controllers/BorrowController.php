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
    public function viewborrow(){
        return view('pinjam-buku');
    }
}

