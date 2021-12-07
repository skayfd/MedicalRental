<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    //
    public $table = 'equipment';
    protected $fillable = [
    'eqName',
    'quantity',
    ];
}
