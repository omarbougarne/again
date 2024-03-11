<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.index', ['users' => $users]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);


        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
    public function restore($id)
{
    $user = User::withTrashed()->find($id);

    $user->restore();

    return redirect()->back()->with('success', 'User restored successfully');
}
public function restoreByUrl($id)
{
    $user = User::withTrashed()->find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    $user->restore();

    return redirect()->back()->with('success', 'User restored successfully');
}

}
