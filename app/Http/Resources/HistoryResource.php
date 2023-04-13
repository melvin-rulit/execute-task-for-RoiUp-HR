<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'client_id' => $this->client_id,
            'feel_locky'=> $this->feel_locky ? $this->feel_locky : "LOSE",
        ];
    }

}
