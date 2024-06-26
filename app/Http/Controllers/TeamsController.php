<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignBuyerToTeamLeadRequest;
use App\Services\TeamUserService;
use Illuminate\Http\JsonResponse;

class TeamsController extends Controller
{
    protected TeamUserService $teamUserService;

    public function __construct(TeamUserService $teamUserService)
    {
        $this->teamUserService = $teamUserService;
    }

    public function assignBuyerToTeamLead(AssignBuyerToTeamLeadRequest $request): JsonResponse
    {
        $this->authorize('assign-buyer', TeamUser::class);
    
        $teamleadId = $request->input('teamlead_id');
        $buyerId = $request->input('buyer_id');
    
        $this->teamUserService->assignBuyerToTeamLead($teamleadId, $buyerId);

        return response()->json(['message' => 'Buyer assigned to team lead']);
    }
}
