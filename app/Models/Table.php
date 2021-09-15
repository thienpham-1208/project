<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use SoftDeletes;

    const BOOKED = 1;
    const UN_BOOKED = 0;

    protected $fillable = [
        'name', 'number', 'status'
    ];
}
