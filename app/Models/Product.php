<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [];
    
    // public function users(){
    //     return $this->belongsTo(User::class, 'id');
    // }

    // public function transactions(){
    //     return $this->hasMany(Transaction::class, 'user_id');
    // }

    // public function user(){
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
}
