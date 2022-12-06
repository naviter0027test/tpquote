<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class QuoteController extends Controller
{
    public function lists(Request $request) {
        return view('quote.lists');
    }

    public function createMain(Request $request) {
        return view('quote.create.main');
    }

    public function editMain(Request $request, $id = 0) {
        return 'quote edit main';
    }

    public function createSub1(Request $request) {
        return 'quote create sub1';
    }

    public function editSub1(Request $request, $id = 0) {
        return 'quote edit sub1';
    }
}
