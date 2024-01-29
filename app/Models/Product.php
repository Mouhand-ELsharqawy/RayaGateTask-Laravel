<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','Name','Price','Quantity','Description'];

    public function catagory(){
        $this->belongsToMany(Catagory::class,'products_catagories_pivot');
    }
}
