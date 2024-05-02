<?php

namespace App\Services;

use App\Models\TeamUser;

class TeamUserService
{
    public function assignBuyerToTeamLead($teamleadId, $buyerId)
    {
        return TeamUser::create([
            'teamlead_id' => $teamleadId,
            'buyer_id' => $buyerId,
        ]);
    }
}