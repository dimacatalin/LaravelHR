<?php

namespace App\Policies;

use App\Models\FileLabel;
use App\Models\User;

class FileLabelPolicy
{
    const ROLE_CREATE = 'file-label:create';
    const ROLE_INDEX = 'file-label:index';
    const ROLE_SHOW = 'file-label:show';
    const ROLE_UPDATE = 'file-label:update';
    const ROLE_DELETE = 'file-label:delete';

    public function before($user, $ability)
    {
        if ($user->hasRole(User::USER_ROLE_ADMIN)) {
            return true;
        }
    }

    public function index(User $user)
    {
        return $user->hasPermissionTo(FileLabelPolicy::ROLE_INDEX);
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
    public function view(User $user, FileLabel $fileLabel): bool
    {
        return $user->hasPermissionTo(FileLabelPolicy::ROLE_SHOW);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(FileLabelPolicy::ROLE_CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FileLabel $fileLabel): bool
    {
        return $user->hasPermissionTo(FileLabelPolicy::ROLE_UPDATE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FileLabel $fileLabel): bool
    {
        return $user->hasPermissionTo(FileLabelPolicy::ROLE_DELETE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FileLabel $fileLabel): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FileLabel $fileLabel): bool
    {
        //
    }
}
