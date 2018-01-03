<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    public function index()
    {
        return view('pages.frontend.index');
    }

    public function products()
    {
    	return view('pages.frontend.products');
    }

    public function details()
    {
    	return view('pages.frontend.details');
    }

    public function checkout()
    {
    	return view('pages.frontend.checkout');
    }
}
