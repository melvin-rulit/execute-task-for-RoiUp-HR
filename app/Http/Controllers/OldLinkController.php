<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Services\OldLinkService;

class OldLinkController extends Controller

{

    public function getHomePage(OldLinkService $oldLinkService, $link)
    {

        $find_and_delete_old_link = $oldLinkService->findOldLinks($link);

        $client = Client::where('generation_links', $link)->get();

        if ($client->isEmpty()) {

            return redirect()->route('register_page');

        } else {

            return view('@sections.Main_section', compact('link'));
        }

    }
}
