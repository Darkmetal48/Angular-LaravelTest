<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'first_surname',
        'second_surname',
        'first_name',
        'middle_name',
        'job_country',
        'id_type',
        'id_number',
        'email',
        'date_of_entry',
        'deparment',
        'state',
    ];
}
