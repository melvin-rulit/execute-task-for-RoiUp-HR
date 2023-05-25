<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Client;

class OldLinkService
{
    public function findOldLinks($incoming_link)
    {
        $client = Client::where('generation_links', $incoming_link)->first();

        if (empty($client)){

            return response()->json([
                'success' => true,
                'message' => 'Ссылка не была найдена'
            ], 200);
        }

        $result_diff = Carbon::parse($client->created_at)->diffInDays(Carbon::now());

        if ($result_diff and $result_diff > 7){
            $client->generation_links = '';
            $client->save();

            return response()->json([
                'success' => true,
                'message' => 'Ссылка удалена'
            ], 200);
        }
    }
}