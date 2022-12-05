<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class QuoteController extends Controller
{
    public function lists(Request $request) {
        return view('quote.lists');
    }

    public function create1(Request $request) {
        return 'quote create1';
    }

    public function edit1(Request $request, $id = 0) {
        return 'quote edit1';
    }
}
