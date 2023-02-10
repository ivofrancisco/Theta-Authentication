<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UpdateItemService;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    /**
     * Update a specific user's profile.
     *
     * @param UpdateItemService $updateItemService
     * @return RedirectResponse
     */
    public function update(Request $request, UpdateItemService $updateItemService): RedirectResponse
    {
        $userId = $request->user_id;
        // Editable form fields
        $requestEntries = ['media', 'first_name', 'last_name', 'phone', 'email', 'job', 'description'];
        //Update user's profile
        User::where('id', $userId)->update(
            $updateItemService->getUpdatedItems($request->all(), $requestEntries)
        );
        // Redirect user to user's profile page
        return redirect('/admin/users/' . $userId . '/profile')->with([
            'message_success' => 'Perfil atualizado com sucesso.',
        ]);
    }
}
