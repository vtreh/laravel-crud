<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;

class ListingPolicy
{
    public function edit(User $user, Listing $listing): bool
    {
        return $listing->employer->user->is($user);
    }
}
