<?php

namespace App\Policies;

use App\Models\User;


/* Policies are classes that organize authorization logic around a particular model or resource. */

class ProductPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user): bool
    {
        return true;
    }

   public function create(User $user): bool
{
    return $user->isAdmin === 1;
}

public function update(User $user): bool
{
    return $user->isAdmin === 1;
}

public function delete(User $user): bool
{
    return $user->isAdmin === 1;
}
}