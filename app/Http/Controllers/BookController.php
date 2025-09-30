<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer|min:0',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book')); 

    }
    public function showAll()
    {
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => 'programming', // default cari "programming"
            'maxResults' => 20,   // jumlah buku per halaman
        ]);

        $data = $response->json();

        return view('books.all', [
            'books' => $data['items'] ?? []
        ]);
    }
    public function search()
    {
        return view('books.search');
    }
    public function searchResults(Request $request)
    {
        $query = $request->input('query');

        // Hapus tanda baca
        $cleanQuery = preg_replace('/[^\p{L}\p{N}\s]/u', '', $query);

        // Encode query
        $encodedQuery = urlencode($cleanQuery);

        // Panggil Google Books API
        $url = "https://www.googleapis.com/books/v1/volumes?q=intitle:$encodedQuery";

        $response = Http::get($url);

        // Cek apakah request sukses
        if ($response->successful()) {
            $data = $response->json();
            $books = $data['items'] ?? []; // kalau nggak ada items, kosongin aja
        } else {
            $books = [];
        }

        return view('books.results', compact('books', 'query'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
