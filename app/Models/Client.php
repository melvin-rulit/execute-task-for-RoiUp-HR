<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

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
    ];

    public function feellocky(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FeelLocky::class);
    }
}
