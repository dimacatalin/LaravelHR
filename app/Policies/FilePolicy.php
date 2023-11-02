<?php

namespace App\Policies;

use App\Models\File;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FilePolicy
{
    const ROLE_CREATE = 'file:create';
    const ROLE_INDEX = 'file:index';
    const ROLE_SHOW = 'file:show';
    const ROLE_UPDATE = 'file:update';
    const ROLE_DELETE = 'file:delete';
    const ROLE_DOWNLOAD = 'file:download';

    public function before($user, $ability)
    {
        if ($user->hasRole(User::USER_ROLE_ADMIN)) {
            return true;
        }
    }

    public function index(User $user)
    {
        return $user->hasPermissionTo(FilePolicy::ROLE_INDEX);
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, File $file): bool
    {
        return $user->hasPermissionTo(FilePolicy::ROLE_SHOW);
    }

    public function download(User $user, File $file): bool
    {
        return $user->hasPermissionTo(FilePolicy::ROLE_DOWNLOAD);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(FilePolicy::ROLE_CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, File $file): bool
    {
        return $user->hasPermissionTo(FilePolicy::ROLE_UPDATE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, File $file): bool
    {
        return $user->hasPermissionTo(FilePolicy::ROLE_DELETE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, File $file): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, File $file): bool
    {
        //
    }
}
