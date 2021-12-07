<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    public $table = 'inventory';
    protected $fillable = [
    'eqName',
    'quantity'];
}
