<?php

namespace App\Repositories\Interfaces;

use App\Models\Client;

interface ClientRepositoryInterface {

    public function  getClientForDelete($id);

    public function  create($request, $random_string);

    public function  getClientByLink(Client $client, $link);

    public function  getClientWithoutAdmin();

}