<?php

namespace App\Policies;

use App\Models\Genres;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenresPolicy
{
    use HandlesAuthorization;
    //Policy for accsesing genres
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genres  $genres
     * @return mixed
     */
    public function view(User $user, Genres $genres)
    {
        return is_admin($user);  
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return is_admin($user);  
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genres  $genres
     * @return mixed
     */
    public function update(User $user, Genres $genres)
    {
        return is_admin($user);  
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genres  $genres
     * @return mixed
     */
    public function delete(User $user, Genres $genres)
    {
        return is_admin($user);  
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genres  $genres
     * @return mixed
     */
    public function restore(User $user, Genres $genres)
    {
        return is_admin($user);  
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genres  $genres
     * @return mixed
     */
    public function forceDelete(User $user, Genres $genres)
    {
        return is_admin($user);  
    }
}
