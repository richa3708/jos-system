<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JosJobOrderLink extends Model
{
    use HasFactory, SoftDeletes;

    public function jobOrder()
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function jobOrderStatement()
    {
        return $this->belongsTo(JobOrderStatement::class);
    }

}
