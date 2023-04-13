<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'generation_links' => $this->generation_links,
            'created_at' => Carbon::createFromDate($this->created_at)->format('d.m.Y'),
        ];
    }

}
