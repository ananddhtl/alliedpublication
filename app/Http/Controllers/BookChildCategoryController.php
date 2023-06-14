<?php

namespace App\Http\Controllers;

use App\Models\BookChildCategory;
use DB;
use Illuminate\Http\Request;

class BookChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookChildCategory = DB::table('book_child_categories')
            ->join('book_categories', 'book_categories.id', '=', 'book_child_categories.book_cat_id')
            ->join('book_sub_categories', 'book_categories.id', '=', 'book_sub_categories.book_cat_id')
            ->select('book_sub_categories.*', 'book_categories.title as category_title', 'book_categories.display_order as sub_display_order', 'book_child_categories.*')
            ->get();

        $groupedBookChildCategory = $bookChildCategory->groupBy('id');

        return view('backend.childcatagory', compact('groupedBookChildCategory'));

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
                'child_title' => 'required|string',
                'book_cat_id' => 'required|integer',
                'book_sub_cat_id' => 'required|integer',

            ]);
            $bookChildCategory = new BookChildCategory();
            $bookChildCategory->child_title = $request->child_title;
            $bookChildCategory->book_cat_id = $request->book_cat_id;
            $bookChildCategory->book_sub_cat_id = $request->book_sub_cat_id;
            $bookChildCategory->display_order = $request->display_order;
            $bookChildCategory->save();
            return redirect()->back()->with('message', 'Your data has been saved successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BookChildCategory $bookChildCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookChildCategory $bookChildCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookChildCategory $bookChildCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookChildCategory $bookChildCategory, $id)
    {
        {
            DB::table('book_child_categories')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Book child catgeories deleted successfully.');
        }
    }
}
