<?php

namespace App\Http\Controllers;

use App\Models\Book;
use DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $books = DB::table('books')
                ->join('book_categories', 'book_categories.id', '=', 'books.book_catagory')
                ->join('book_sub_categories', 'book_sub_categories.id', '=', 'books.book_sub_catagory')
                ->join('book_child_categories', 'book_child_categories.id', '=', 'books.book_child_catagory')
                ->join('authors', 'authors.id', '=', 'books.author_id')
                ->select('books.*', 'book_categories.title', 'book_sub_categories.sub_title', 'book_child_categories.child_title', 'authors.fullname')->where('is_deleted', 0)->get();
            return view('backend.books', compact('books'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'book_title' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_catagory' => 'required|integer',
            'book_sub_catagory' => 'required|integer',
            'book_child_catagory' => 'required|integer',
            'description' => 'required|string',
            'author_id' => 'required|integer',
            'published_year' => 'required|date',

        ]);
        $book = new Book();
        $book->book_title = $request->book_title;
        $book->book_catagory = $request->book_catagory;
        $book->book_sub_catagory = $request->book_sub_catagory;
        $book->book_child_catagory = $request->book_child_catagory;
        $book->description = $request->description;
        $book->anyflip_books_link = $request->anyflip_books_link;
        $book->author_id = $request->author_id;
        $book->published_year = $request->published_year;
        $book->status = $request->featured_or_not;
        $book->is_deleted = 0;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $img_name = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('uploads/books/thumbnails/', $img_name);
            $save_url = '/uploads/books/thumbnails/' . $img_name;
            $book->thumbnail = $save_url;
        }

        $book->save();

        return redirect()->back()->with('message', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book,$id)
    {
        $books = DB::table('books')
            ->join('book_categories', 'book_categories.id', '=', 'books.book_catagory')
            ->join('book_sub_categories', 'book_sub_categories.id', '=', 'books.book_sub_catagory')
            ->join('book_child_categories', 'book_child_categories.id', '=', 'books.book_child_catagory')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.*', 'book_categories.title', 'book_sub_categories.sub_title', 'book_child_categories.child_title', 'authors.fullname')
            ->where('is_deleted', 0)
            ->get();
        $editBooks = DB::table('books')
            ->join('book_categories', 'book_categories.id', '=', 'books.book_catagory')
            ->join('book_sub_categories', 'book_sub_categories.id', '=', 'books.book_sub_catagory')
            ->join('book_child_categories', 'book_child_categories.id', '=', 'books.book_child_catagory')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.*', 'book_categories.title', 'book_sub_categories.sub_title', 'book_child_categories.child_title', 'authors.fullname')
            ->where('is_deleted', 0)
            ->where('books.id', $id)
            ->first();
           
        return view('backend.books', compact('books', 'editBooks'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    
   

    $book = Book::find($id);
    if (!$book) {
        return redirect()->back()->with('message', 'Book not found');
    }

    $book->book_title = $request->book_title;
    $book->book_catagory = $request->book_category;
    $book->book_sub_catagory = $request->book_sub_category;
    $book->book_child_catagory = $request->book_sub_category;
    $book->description = $request->description;
    $book->anyflip_books_link = $request->anyflip_books_link;
    $book->author_id = $request->author_id;
    $book->published_year = $request->published_year;
    $book->status = $request->featured_or_not;

    if ($request->hasFile('thumbnail')) {
        $thumbnail = $request->file('thumbnail');
        $img_name = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move('uploads/books/thumbnails/', $img_name);
        $save_url = '/uploads/books/thumbnails/' . $img_name;
        $book->thumbnail = $save_url;
    }

    $book->save();

    return redirect('/addbooks')->with('message', 'Book updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book, $id)
    {
        {

            DB::table('books')->where('id', $id)->update(
                [
                    'is_deleted' => 1,
                ]
            );

            return redirect()->back()->with('message', 'Book has been deleted successfully');
        }
    }
}