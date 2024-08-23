<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServices extends Model
{
    use HasFactory;

    protected $fillable = ['subName', 'subCost', 'service_id'];

    public function service(){

        return $this->belongsTo(Services::class, 'service_id');
    }

}