<?php

namespace App\Policies;

use App\Models\AppModelsTeamUser;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeamUserPolicy
{
    /**
     * Determine whether the user can attach buyer to teamlead .
     */
    public function assignBuyer(User $user, TeamUser $teamUser)
    {
        // allow for admin or for teamlead to which linking buyer & check buyer role
        return $user->can('assignBuyer') || $user->id === $teamUser->teamlead_id
        && $teamUser->buyer->hasRole('buyer');
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
    public function view(User $user, AppModelsTeamUser $appModelsTeamUser): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AppModelsTeamUser $appModelsTeamUser): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AppModelsTeamUser $appModelsTeamUser): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AppModelsTeamUser $appModelsTeamUser): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AppModelsTeamUser $appModelsTeamUser): bool
    {
        //
    }
}
