<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'user', 'details.book'])->latest()->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::where('stock', '>', 0)->get();
        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id'   => 'required|exists:books,id',
            'quantity'  => 'required|integer|min:1',
        ], [
            'member_id.required' => 'Anggota wajib dipilih.',
            'book_id.required'   => 'Buku wajib dipilih.',
            'quantity.required'  => 'Jumlah pinjam wajib diisi.',
            'quantity.min'       => 'Jumlah pinjam minimal 1 buku.',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock < $request->quantity) {
            return back()
                ->withErrors(['quantity' => 'Stok buku tidak mencukupi (tersedia: ' . $book->stock . ').'])
                ->withInput();
        }

        $borrowing = Borrowing::create([
            'user_id'        => $request->user()->id,
            'member_id'      => $request->member_id,
            'borrowing_date' => now()->toDateString(),
            'due_date'       => now()->addDays(7)->toDateString(),
            'status'         => 'borrowed',
        ]);

        $borrowing->details()->create([
            'book_id'  => $book->id,
            'quantity' => $request->quantity,
        ]);

        $book->decrement('stock', $request->quantity);

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Transaksi peminjaman berhasil disimpan dan stok buku berkurang.');
    }

    public function returnBook(Borrowing $borrowing)
    {
        if ($borrowing->status === 'returned') {
            return back()->with('success', 'Buku sudah dikembalikan sebelumnya.');
        }

        $borrowing->update([
            'return_date' => now()->toDateString(),
            'status'      => 'returned',
        ]);

        foreach ($borrowing->details as $detail) {
            $detail->book->increment('stock', $detail->quantity);
        }

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Buku berhasil dikembalikan dan stok bertambah kembali.');
    }
}