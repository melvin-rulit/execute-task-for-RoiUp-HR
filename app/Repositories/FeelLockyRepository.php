<?php

namespace App\Repositories;

use App\Models\FeelLocky;
use App\Repositories\Interfaces\FeelLockyRepositoryInterface;

class FeelLockyRepository implements FeelLockyRepositoryInterface{

    public function create($id_client)
    {

        $result_lose_or_intedjer = FeelLockyCalculateHelper(mt_rand(1, 1000));

        FeelLocky::create([
            'client_id' => $id_client,
            'feel_locky' => $result_lose_or_intedjer,
        ]);

        return $result_lose_or_intedjer;
    }

}