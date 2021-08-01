<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmailTakenController extends Controller
{
    public function check(Request $request)
    {
        // Function which checks if the email entered in registration is taken or not
        if ($request->get('email')) {
            $email = $request->get('email');
            //Fetch users where is the email equal to request email
            $users = User::where('email', $email)->count();
            if ($users > 0) {
                echo "taken";
            } else {
                echo "not_taken";
            }
        }
    }
}
