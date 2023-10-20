<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public $incrementing = false;
    protected $guarded  = '';
    use HasFactory;
}
