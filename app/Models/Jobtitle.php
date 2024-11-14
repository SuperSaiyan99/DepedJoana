<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    use HasFactory;

    protected $table = 'job_titles';

    protected $casts = [
      'is_available' =>  'boolean'
    ];
}
