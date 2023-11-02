<?php

namespace App\Policies;

use App\Models\Label;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LabelPolicy
{
    const ROLE_CREATE = 'label:create';
    const ROLE_INDEX = 'label:index';
    const ROLE_SHOW = 'label:show';
    const ROLE_UPDATE = 'label:update';
    const ROLE_DELETE = 'label:delete';

    public function before($user, $ability)
    {
        if ($user->hasRole(User::USER_ROLE_ADMIN)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    public function index(User $user)
    {
        return $user->hasPermissionTo(LabelPolicy::ROLE_INDEX);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Label $label): bool
    {
        return $user->hasPermissionTo(LabelPolicy::ROLE_SHOW);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(LabelPolicy::ROLE_CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Label $label): bool
    {
        return $user->hasPermissionTo(LabelPolicy::ROLE_UPDATE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Label $label): bool
    {
        return $user->hasPermissionTo(LabelPolicy::ROLE_DELETE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Label $label): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Label $label): bool
    {
        //
    }
}
