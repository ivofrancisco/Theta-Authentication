<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use \Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function home(): View
    {
        // User ID
        $userId = auth()->user()->id;
        // Take user to his/her profile page
        return view('admin.users.profile')->with([
            'title' => 'Início',
            'user' => User::where(['id' => $userId])->firstOrFail(),
        ]);
    }
}
