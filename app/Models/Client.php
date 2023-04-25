<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    public $table = 'clients';

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'phone_number',
        'generation_links',
        'created_at',
        'updated_at',
    ];

    public static function get_client_id_whis_link($link)
    {
        $client = Client::where('generation_links', '=', $link)->get();
        return $client[0]['id'];
    }

    public function feellocky(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FeelLocky::class);
    }
}
