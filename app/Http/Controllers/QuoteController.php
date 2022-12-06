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

    public function createSub1_1(Request $request) {
        return view('quote.create.sub1-1');
    }

    public function editSub1_1(Request $request, $id = 0) {
        return 'quote edit sub1';
    }

    public function createSub2(Request $request) {
        return 'quote create sub 2';
    }

    public function editSub2(Request $request, $id = 0) {
        return 'quote edit sub2';
    }

    public function createSub2_1(Request $request) {
        return 'quote create sub 2-1';
    }

    public function editSub2_1(Request $request, $id = 0) {
        return 'quote edit sub 2-1';
    }
}
