<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobOrder extends Model
{
    use HasFactory, SoftDeletes;

    public function typeOfWork()
    {
        return $this->belongsTo(TypeOfWork::class);
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
    }

    public function jobOrderStatement()
    {
        return $this->belongsToMany(JobOrderStatement::class, 'jos_job_order_links');
    }

}
