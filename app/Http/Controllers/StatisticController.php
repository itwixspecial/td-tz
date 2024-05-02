<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateStatisticRequest;
use App\Models\Statistic;
use App\Services\StatisticService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class StatisticController extends Controller
{    
    use AuthorizesRequests;

    protected $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index(Request $request)
    {
        $user = $request->user(); // Отримуємо поточного користувача

        $statistics = $this->statisticService->getAllStatisticsByPermission($user);

        return response()->json($statistics, 200);
    }

    public function store(CreateStatisticRequest $request)
    {
        $statistic = $this->statisticService->createStatistic($request);
        return response()->json($statistic, 201);
    }

    public function update(CreateStatisticRequest $request, Statistic $statistic)
    {
        // перевірка чи може виконувати цю дію
        $this->authorize('update-statistic', $statistic);

        $statistic = $this->statisticService->updateStatistic($request, $statistic);
        return response()->json($statistic, 200);
    }

    public function destroy(Statistic $statistic)
    {
        $this->authorize('update-statistic', $statistic);

        $statistic->delete();

        return response()->json(['message' => 'Statistic deleted successfully']);
    }
}
