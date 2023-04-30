<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Services\OldLinkService;
use App\Repositories\Interfaces\ClientRepositoryInterface;

class OldLinkController extends Controller

{

    private $clientRepository;

    public function __construct(ClientRepositoryInterface  $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getHomePage(OldLinkService $oldLinkService, $link)
    {

        $find_and_delete_old_link = $oldLinkService->findOldLinks($link);

        $client = Client::where('generation_links', $link)->get();
        // $client = $this->clientRepository->getClientByLink(Client $client, $link);

        if ($client->isEmpty()) {

            return redirect()->route('register_page');

        } else {

            return view('@sections.Main_section', compact('link'));
        }

    }
}
