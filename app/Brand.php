<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Brand extends Model
{
    //
    protected $table = 'brand';
    protected $fillable = [
        'name', 'image','description','brand_id',
    ];
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    public function product(){
        return $this->hasMany('App\Product');
    }
}
