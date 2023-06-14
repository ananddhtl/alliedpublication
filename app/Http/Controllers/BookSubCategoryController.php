<?php

namespace App\Http\Controllers;

use App\Models\BookSubCategory;
use DB;
use Illuminate\Http\Request;

class BookSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookSubCategory = DB::table('book_sub_categories')
            ->join('book_categories', 'book_categories.id', '=', 'book_sub_categories.book_cat_id')
            ->select('book_sub_categories.*', 'book_categories.title as category_title', 'book_categories.display_order as sub_display_order')
            ->get();

        return view('backend.subcategory', compact('bookSubCategory'));

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
        {

            $request->validate([
                'sub_title' => 'required|string',
                'book_cat_id' => 'required|integer',

            ]);

            $bookSubCategory = new BookSubCategory();
            $bookSubCategory->sub_title = $request->sub_title;
            $bookSubCategory->book_cat_id = $request->book_cat_id;
            $bookSubCategory->display_order = $request->display_order;
            $bookSubCategory->save();
            return redirect()->back()->with('message', 'Your data has been saved successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BookSubCategory $bookSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookSubCategory $bookSubCategory,$id)
    {
        {
            $bookSubCategory = DB::table('book_sub_categories')
            ->join('book_categories', 'book_categories.id', '=', 'book_sub_categories.book_cat_id')
            ->select('book_sub_categories.*', 'book_categories.title as category_title', 'book_categories.display_order as sub_display_order')
            ->get();
            $editbookSubCategory = DB::table('book_sub_categories')
            ->join('book_categories', 'book_categories.id', '=', 'book_sub_categories.book_cat_id')
            ->select('book_sub_categories.*', 'book_categories.title as category_title', 'book_categories.display_order as sub_display_order')
            ->where('book_sub_categories.id',$id)
            ->first();
            return view('backend.subcategory', compact('bookSubCategory', 'editbookSubCategory'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookSubCategory $bookSubCategory,$id)
    {
        {
            
            $request->validate([
                'sub_title' => 'required|string',
                'cat_id' => 'required|integer',
            ]);
            
            $bookSubCategory = BookSubCategory::findOrFail($id);
            $bookSubCategory->sub_title = $request->sub_title;
            $bookSubCategory->book_cat_id = $request->cat_id;
            $bookSubCategory->display_order = $request->display_order;
            $bookSubCategory->save();
            return redirect('/subCatagory')->with('message', 'Your data has been updated successfully');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookSubCategory $bookSubCategory,$id)
    {
        {
            DB::table('book_sub_categories')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Book sub catgeories deleted successfully.');
        }
    }
}