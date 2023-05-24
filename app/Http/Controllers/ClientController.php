<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsResource;
use App\Http\Requests\CreateClientRequest;
use App\Repositories\Interfaces\ClientRepositoryInterface;

class ClientController extends Controller
{

    private $clientRepository;

    public function __construct(ClientRepositoryInterface  $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = $this->clientRepository->getClientWithoutAdmin();

        return ClientsResource::collection($client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $random_string = Str::random(30);

        $this->clientRepository->create($request, $random_string);

        return response()->json([
            'success' => true,
            'message' => $random_string
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $edit_client = Client::find($client->id);

        if ($request['row_name'] === 'name') {
            $edit_client->name = $request['field_value_name'];
        } elseif ($request['row_name'] === 'phone_number') {

            $edit_client->phone_number = $request['field_value_phone_number'];
        }

        $edit_client->save();

        return response()->json([
            'success' => true,
            'message' => 'Данные клиента успешно обновленны'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->clientRepository->getClientForDelete($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Клиент был успешно удален'
        ], 200);
    }
}
