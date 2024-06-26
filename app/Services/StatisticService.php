<?php

namespace App\Services;

use App\Models\User;
use App\Models\Statistic;
use Illuminate\Database\Eloquent\Collection;

class StatisticService
{
    public function createStatistic(string $name, ?string $notes): Statistic
    {
        $statistic = new Statistic();
        $statistic->name = $name;
        $statistic->purchases = 0;
        $statistic->notes = $notes;
        $statistic->user_id = auth()->id();
        $statistic->save();

        return $statistic;
    }

    public function updateStatistic(string $name, int $purchases, string $notes, Statistic $statistic): Statistic
    {
        $statistic->name = $name;
        $statistic->purchases = $purchases;
        $statistic->notes = $notes;
        $statistic->save();
    
        return $statistic;
    }

    public function getAllStatisticsByPermission(User $user): Collection
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
