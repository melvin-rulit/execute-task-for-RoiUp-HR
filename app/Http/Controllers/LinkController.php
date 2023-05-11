<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Str;
use App\Repositories\Interfaces\LinkRepositoryInterface;

class LinkController extends Controller
{

    private $linkRepository;

    public function __construct(LinkRepositoryInterface $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }


    public function generate_new_link(Request $request): \Illuminate\Http\JsonResponse
    {
        $client = $this->linkRepository->findClientWhisLink($request->link);
        $client->update(['generation_links' => Str::random(30)]);

        return response()->json([
            'success' => true,
            'message' => $client->generation_links,
        ], 200);
    }

    public function delete_link(Request $request): \Illuminate\Http\JsonResponse
    {
        $client = $this->linkRepository->findClientWhisLink($request->link);
        $client->update(['generation_links' => '']);

        return response()->json([
            'success' => true,
            'message' => 'Ссылка была удалена'
        ], 200);
    }
}
