<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    public function task() {
        return $this->belongsTo(Task::class);
    }
    
    public function tasker() {
        return $this->belongsTo(User::class, 'tasker_id');
    }
    
}
