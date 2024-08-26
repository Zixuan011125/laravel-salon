<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersProducts extends Model
{
    use HasFactory;

    protected $table = 'customers_products';

    protected $fillable = [
        'customer_id',  // Add this line
        'product_id',
        'quantity_sold',
    ];
}
