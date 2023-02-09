<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * Display a specific user's profile.
     *
     * @param $id
     * @return View
     */
    public function profile($id): View
    {
        return view('admin.users.profile')->with([
            'title' => 'Perfil',
            'user' => User::where(['id' => $id])->firstOrFail(),
        ]);
    }
}
