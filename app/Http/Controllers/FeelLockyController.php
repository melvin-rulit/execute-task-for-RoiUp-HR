<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistoryResource;
use Illuminate\Http\Request;
use App\Models\FeelLocky;
use App\Models\Client;

class FeelLockyController extends Controller
{
    public function im_feelLocky(Request $request)
    {
        $id_client = Client::get_client_id_whis_link($request->link);

        $random_value = mt_rand(1, 1000);

        $result_lose_or_intedjer = FeelLockyCalculateHelper($random_value);

        FeelLocky::create([
            'client_id' => $id_client,
            'feel_locky' => $result_lose_or_intedjer,
        ]);

        return response()->json([
            'success' => true,
            'message' => $result_lose_or_intedjer
        ], 200);

    }

    public function history_feelLock(Request $request)
    {

        $id_client = Client::get_client_id_whis_link($request->link);

        $client = Client::find($id_client);

        foreach ($client->feellocky as $value) {
            $array_whis_history_feel_locky [] = $value;
        }

        $last_three_field = array_slice($array_whis_history_feel_locky, -3);

        return HistoryResource::collection($last_three_field);

    }
}
