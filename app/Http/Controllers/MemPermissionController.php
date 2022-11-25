<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MemPermissionRepository;
use Session;
use Exception;

class MemPermissionController extends Controller
{
    public function lists(Request $request) {
        return view('member.permission');
    }
}
