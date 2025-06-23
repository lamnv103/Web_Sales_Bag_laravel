<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'user_id', 
        'name', 
        'city', 
        'locality', 
        'zip', 
        'phone', 
        'note', 
        'address',  
        'state',  
        'country', 
        'landmark', 
    ];
    

    // Quan hệ với bảng User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}