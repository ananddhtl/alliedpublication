<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\BookChildCategory;
use App\Models\BookSubCategory;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getServices()
    {
        $service = DB::table('services')->select('*')->get();
        return view('frontend.service', compact('service'));

    }
    public function getBooksData(Request $request)
    {
        $categories = BookCategory::all();
        $subCategories = BookSubCategory::all();
        $childCategories = BookChildCategory::all();
        $query = DB::table('books')
            ->join('book_categories', 'book_categories.id', '=', 'books.book_catagory')
            ->join('book_sub_categories', 'book_sub_categories.id', '=', 'books.book_sub_catagory')
            ->join('book_child_categories', 'book_child_categories.id', '=', 'books.book_child_catagory')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.*', 'book_categories.title', 'book_sub_categories.sub_title', 'book_child_categories.child_title', 'authors.fullname')
            ->where('is_deleted', 0);
        $books = $query->get();

        return view('frontend.books', compact('categories', 'subCategories', 'childCategories', 'books'));
    }
    public function getSearchResults(Request $request)
    {
        $type = $request->input('type');
        $subject = $request->input('subject');
        $class = $request->input('class');
        $query = DB::table('books')
            ->join('book_categories', 'book_categories.id', '=', 'books.book_catagory')
            ->join('book_sub_categories', 'book_sub_categories.id', '=', 'books.book_sub_catagory')
            ->join('book_child_categories', 'book_child_categories.id', '=', 'books.book_child_catagory')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.*', 'book_categories.title', 'book_sub_categories.sub_title', 'book_child_categories.child_title', 'authors.fullname')
            ->where('is_deleted', 0);
  
        if ($type && $type !== 'All') {
            $query->where('book_categories.title', $type);
        }
        if ($subject && $subject !== 'Select Subject') {
            $query->where('book_sub_categories.id', $subject);
        }
        if ($class && $class !== 'Select Class') {
            $query->where('book_child_categories.id', $class);
        }
    
        $books = $query->get();
  
        return response()->json($books);
    }
    

    public function getHomePage()
    {
        $author = DB::table('authors')->select('*')->get();
        return view('frontend.main', compact('author'));
    }
    public function forRegisteration()
    {
        $userDistrict = DB::table('user_districts')->select('*')->get();
        $userRoles = DB::table('user_roles')->select('*')->get();
        return view('frontend.register', compact('userRoles', 'userDistrict'));
    }

}