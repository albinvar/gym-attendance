<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    // edit card data
    public function update(Request $request, User $user)
    {
        // validate request
        $this->validate($request, [
            'card' => 'required|string|max:25',
        ]);

        // update user card data
        $user->card = $request->card;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Card data updated successfully');
    }

    public function showAttendance(User $user)
    {
        return view('admin.users.attendance', compact('user'));
    }
}
