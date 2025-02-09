<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductsController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        $products = Products::all();
        return view('products.product', compact('sections', 'products'));
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
        Products::create([
            'Product_name' => $request->Product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);
        session()->flash('Add', 'تم اضافه المنتج بنجاح');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = Section::where('section_name', $request->section_name)->first()->id;
        $products = Products::findorFail($request->pro_id);

        $products->update([
            'Product_name' => $request->Product_name,
            'description' => $request->description,
            'section_id' => $id
        ]);
        session()->flash('Edit', 'تم تعديل البيانات بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $products = Products::findorFail($request->pro_id);
        $products->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return back();
    }
}
