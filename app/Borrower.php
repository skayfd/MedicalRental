<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    public $table = 'borrowers';
    protected $fillable = [
    'lastName',
    'firstName',
    'contactNumber'];
}
