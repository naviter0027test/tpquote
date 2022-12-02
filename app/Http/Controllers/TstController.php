<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TstController extends Controller
{
    public function iframeMother(Request $request) {
        return view('test.iframe.mother');
    }

    public function iframeChild(Request $request) {
        return view('test.iframe.child');
    }
}
