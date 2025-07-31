<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
    'firstname', 'middlename', 'lastname', 
    'medicine_name', 'brand_name', 'dosage', 'category'
];

}
