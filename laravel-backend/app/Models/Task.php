<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'budget', 'category', 'deadline', 'client_id',
    ];
    
    


    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }
    
    public function bids() {
        return $this->hasMany(Bid::class);
    }
    
}
