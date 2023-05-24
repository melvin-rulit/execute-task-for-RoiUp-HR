<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeelLocky extends Model
{
    protected $fillable = [
        'client_id',
        'feel_locky',
    ];

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
