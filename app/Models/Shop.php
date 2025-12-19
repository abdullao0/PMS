<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'numberOfEmployees',
        'logo',
        'description'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
