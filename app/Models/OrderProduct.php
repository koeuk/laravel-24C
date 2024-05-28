<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;


    protected $fillable = ['quatity','product_id'];
    // public function  product () {
    //     return $this->belongsTo(Product::class);
    // }
    public static function list(){
        return self::all();
    }
    public static function store($request, $id = null){
        $data = $request->only('quatity','product_id');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
        
    }
}
