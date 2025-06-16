<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobOrderStatement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reference_number',
        'total_job_orders',
        'total_amount',
        'paid_amount',
        'balance_amount',
        'remarks'
    ];

    public function jobOrders()
    {
        return $this->belongsToMany(JobOrder::class, 'jos_job_order_links');
    }

}
