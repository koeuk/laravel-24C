<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description','product_id'];
// relationships one to many
    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
// get list of products
    public static function list()
    {
        return self::all();
    }
   
//    
    public static function store($request, $id = null)
    {
        $data = $request->only('name', 'description','product_id');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
