<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenances';
    protected $primaryKey = 'no_mwo';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'no_mwo',
        'request_date',
        'verified_date',
        'input_by',
        'requester_name',
        'perihal',
        'problem',
        'location',
        'foto',
        'status'
    ];
    protected $casts = [
        'request_date' => 'datetime',
        'verified_date' => 'datetime',
    ];
}
