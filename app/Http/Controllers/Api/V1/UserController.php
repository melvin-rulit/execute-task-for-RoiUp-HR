<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsResource;
use App\Http\Resources\HistoryResource;
use App\Models\Client;
use App\Models\FeelLocky;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function get_all_clients()
    {

        $user = Client::where('id', '!=', 1)->get();

        return ClientsResource::collection($user);
    }


    public function edit_client_in_DB(Request $request)
    {
        $edit_client = Client::find($request['field_id']);

        if ($request['row_name'] === 'name') {
            $edit_client->name = $request['field_value_name'];
            $edit_client->save();

        } elseif ($request['row_name'] === 'phone_number') {

            $edit_client->phone_number = $request['field_value_phone_number'];
            $edit_client->save();
        }

        return "Служебная информация обновлена";

    }

    public function send_data_registration(Request $request)
    {

        $random_string = $this->generate_string();

        Client::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'generation_links' => $random_string,
        ]);

        return $random_string;

    }

    public function generate_string(): string
    {
        return Str::random(30);
    }

    public function value_feelLock(): string
    {
        return Str::random(30);
    }

    public function random_value_feelLock(): string
    {
        return mt_rand(1, 1000);
    }

    public function get_client_id_whis_link($link)
    {
        $client = Client::where('generation_links', '=', $link)->get();
        return $client[0]['id'];
    }

    public function step1_for_feelLocky_result(Request $request): string
    {
        $incoming_link = $request->link;

        $id_client = $this->get_client_id_whis_link($incoming_link);

        $random_value = $this->random_value_feelLock();

        $result_return_lose_or_intedjer = $this->step2_for_feelLocky_result($random_value);

        if ($result_return_lose_or_intedjer === "Lose") {
            $temporary_before_insert_result = '';
        } else {
            $temporary_before_insert_result = $result_return_lose_or_intedjer;
        }

        FeelLocky::create([
            'client_id' => $id_client,
            'feel_locky' => $temporary_before_insert_result,
        ]);

        return $result_return_lose_or_intedjer;

    }

    public function step2_for_feelLocky_result($incoming_random_value): string
    {
// ---- Блок который вычисляет из числа четное или нечетное оно и %проценты от этого числа

        if ($incoming_random_value & 1) {

            return "Lose";

        } else {
            if ($incoming_random_value > 900) {
                $procent = 80;
                $result_win = $incoming_random_value * ($procent / 100);
                return  round($result_win);

            } elseif ($incoming_random_value > 600) {

                $procent = 60;
                $result_win = $incoming_random_value * ($procent / 100);
                return round($result_win);

            } elseif ($incoming_random_value > 300) {

                $procent = 20;
                $result_win = $incoming_random_value * ($procent / 100);
                return round($result_win);

            } elseif ($incoming_random_value < 300) {

                $procent = 10;
                $result_win = $incoming_random_value * ($procent / 100);
                return round($result_win);
            }


        }

    }

    public function history_feelLock(Request $request)
    {
        $incoming_link = $request->link;
        $id_client = $this->get_client_id_whis_link($incoming_link);
        $client = Client::find($id_client);

        $array_whis_history_feel_locky = [];

        foreach ($client->feellocky as $value) {
            $array_whis_history_feel_locky [] = $value;
        }
        $last_three_field = array_slice($array_whis_history_feel_locky, -3);
        return HistoryResource::collection($last_three_field);

    }

    public function generate_new_link(Request $request)
    {

        $random_string = $this->generate_string();
        $incoming_link = $request->link;

        $user = Client::all();
        foreach ($user->where('generation_links', '=', $incoming_link) as $value) {
            $value->generation_links = $random_string;
            $value->save();
        }

        return $random_string;

    }


    public function delete_link(Request $request)
    {

        $incoming_link = $request->link;
        $user = Client::all();
        foreach ($user->where('generation_links', '=', $incoming_link) as $value) {
            $value->generation_links = '';
            $value->save();
        }

        return 'ok';

    }


    public function delete_client_from_DB(Request $request)

    {
        $client = Client::find($request->field_id);

        $client->delete();

        return "Deleted";
    }


}

