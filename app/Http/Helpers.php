<?php 

//Function which check if function we want to declare is not already declared
if (! function_exists('is_admin')) {
    //function to check if the user is admin or not
    function is_admin($user)
    {
        if ($user) {
            $role = $user->role; 
            if($role == "admin"){
                return true;
            }
        }
        return false; 
    }
}