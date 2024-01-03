<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Invoice extends Model
{
    protected $table = ('invoices');
    protected $primaryKey = 'id';

    public function customer(){
        return $this->belongsTo(Customer::class);

    }
}
