<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Interfaces\LinkRepositoryInterface;

class LinkRepository implements LinkRepositoryInterface
{
    public function findClientWhisLink($link)
    {
        return Client::where('generation_links', $link)->first();
    }
}
