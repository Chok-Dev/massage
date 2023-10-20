<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Queue extends Model
{
    protected $fillable = [
        'start_time',
        'finish_time',
        'content',
        'customer_id',
        'employee_id',
    ];


    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
    use HasFactory;
}
