<?php

namespace App\Services;

use App\Models\User;
use App\Models\Statistic;
use Illuminate\Support\Facades\Auth;


class StatisticService
{
    public function createStatistic($request)
    {
        $statistic = new Statistic();
        $statistic->name = $request->name;
        $statistic->notes = $request->notes;
        $statistic->user_id = auth()->id();
        $statistic->save();

        return $statistic;
    }

    public function updateStatistic($request, Statistic $statistic)
    {
        $statistic->name = $request->name;
        $statistic->notes = $request->notes;
        $statistic->save();
    
        return $statistic;
    }

    public function getAllStatisticsByPermission(User $user)
    {
        if ($user->can('viewAllStatistic')) {
            return Statistic::all();
        } elseif ($user->can('viewTeamStatistic')) {
            // Отримуємо ідентифікатори баєрів тімліда
            $teamLeadBuyersIds = $user->teamLeadBuyers->pluck('id')->toArray();
            return Statistic::whereIn('user_id', $teamLeadBuyersIds)->get();
        } else {
            return Statistic::where('user_id', $user->id)->get();
        }
    }
}
