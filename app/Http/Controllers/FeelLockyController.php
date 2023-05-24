<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\HistoryResource;
use App\Repositories\Interfaces\FeelLockyRepositoryInterface;

class FeelLockyController extends Controller
{

    private $feelLockyRepository;

    public function __construct(FeelLockyRepositoryInterface  $feelLockyRepository)
    {
        $this->feelLockyRepository = $feelLockyRepository;
    }


    public function im_feelLocky(Request $request)
    {
        $client = Client::where('generation_links',$request->link)->first();

        $result_lose_or_intedjer = $this->feelLockyRepository->create($client->id);

        return response()->json([
            'success' => true,
            'message' => $result_lose_or_intedjer
        ], 200);
    }

    public function history_feelLock(Request $request)
    {
        $client = Client::where('generation_links',$request->link)->first();

        foreach ($client->feellocky as $value) {
            $array_whis_history_feel_locky[] = $value;
        }

        $last_three_field = array_slice($array_whis_history_feel_locky, -3);

        return HistoryResource::collection($last_three_field);
    }
}
