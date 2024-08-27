<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $table = "detail_sales";
    protected $fillable = ['sales_id', 'product_id', 'qty', 'sub_total'];
}
