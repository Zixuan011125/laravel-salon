<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subServices(){
        
        return $this->hasMany(SubServices::class, 'service_id');
    }
}
