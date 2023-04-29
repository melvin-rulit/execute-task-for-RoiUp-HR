<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Interfaces\ClientRepositoryInterface;

class  ClientRepository implements ClientRepositoryInterface{

    public function getClientForDelete($id)
    {
        return Client::find($id);
    }

    public function create($request, $random_string)
    {
        Client::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'generation_links' => $random_string,
        ]);
    }

    public function getClientByLink(Client $client, $link)
    {
        return Client::where('generation_links', $link)->get();
    }

    public function getClientWithoutAdmin()
    {
        return Client::where('id', '!=', 1)->get();
    }
}


