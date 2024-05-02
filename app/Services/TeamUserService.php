<?php

namespace App\Services;

use App\Models\TeamUser;

class TeamUserService
{
    public function assignBuyerToTeamLead($teamleadId, $buyerId): TeamUser
    {
        return TeamUser::create([
            'teamlead_id' => $teamleadId,
            'buyer_id' => $buyerId,
        ]);
    }
}