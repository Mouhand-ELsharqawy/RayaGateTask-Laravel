<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catagory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','Name'];

    public function product(){
        $this->belongsToMany(Product::class,'products_catagories_pivot');
    }
}
