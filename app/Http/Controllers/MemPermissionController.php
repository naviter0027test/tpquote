<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MemPermissionRepository;
use Session;
use Exception;

class MemPermissionController extends Controller
{
    public function lists(Request $request) {
        $memberPermission = Session::get('memberPermission');
        $memPermissionRepo = new MemPermissionRepository();
        $memPermissionList = $memPermissionRepo->getAll();
        return view('member.permission', ['memberPermission' => $memberPermission, 'memPermissionList' => $memPermissionList]);
    }
}
