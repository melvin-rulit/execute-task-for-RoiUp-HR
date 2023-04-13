<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;


class PagesController extends Controller
{

    public function find_old_links($generation_link)
    {

        $client = Client::where('generation_links', $generation_link)->get();

        if ($client->isEmpty()){
            return true;
        }

        $result_diff = Carbon::parse($client[0]->created_at)->diffInDays(Carbon::now());

        if ($result_diff > 7){
            $client[0]->generation_links = '';
            $client[0]->save();

            return true;
        }

    }

    public function getRgisterPage()
    {

        return view('@sections.Main_section');

    }

    public function getAdminPage()
    {

        return view('@sections.Main_section');

    }

    public function getHomePage($link)
    {
        $this->find_old_links($link);

        $client = Client::where('generation_links', $link)->get();

        if ($client->isEmpty()) {

            return redirect()->route('admin.register_client');

        } else {
            return view('@sections.Main_section', compact('link'));
        }


    }


}
