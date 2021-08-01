<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // Return to the table of all users - paginated
        return view('users.index')->with('users', User::paginate(5));
    }
    public function destroy(User $user)
    {
        // Delete user if the user is admin
        if (is_admin(Auth::user())) {
            $user->delete();
            session()->flash('success', 'Uživatel odstraněn.');
        } else {
            session()->flash('success', 'Uživatel nebyl odstraněn.');
        }

        return redirect(route('users.index'));
    }
}
