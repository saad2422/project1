<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Products;
use App\Models\invoice;

class Customers_Report extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $products = Products::all();
        return view('reports.customers_report', compact('sections', 'products'));
    }
    public function Search_customers(Request $request)
    {
        if ($request->Section && $request->product && $request->start_at == '' && $request->end_at == '') {
            $invoices = invoice::select('*')->where('section_id', '=', $request->Section)->where('product', '=', $request->product)->get();
            $sections = Section::all();
            $products = Products::all();
            return view('reports.customers_report', compact('invoices', 'sections', 'products'));
        } else {
            $start_at = date($request->start_at);
            $end_at = date($request->end_at);
            $invoices = invoice::select('*')->whereBetween('invoice_Date', [$start_at, $end_at])->where('section_id', '=', $request->Section)->where('product', '=', $request->product)->get();
            $sections = Section::all();
            $products = Products::all();
            return view('reports.customers_report', compact('invoices', 'sections', 'products', 'start_at', 'end_at'));
        }
    }
}
