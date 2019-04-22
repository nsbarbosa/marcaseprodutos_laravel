<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $fillable = [
        'name', 'brand_id','image','description',
    ];
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    public function brand(){
        return $this->belongsTo('App\Brand');
    }
}