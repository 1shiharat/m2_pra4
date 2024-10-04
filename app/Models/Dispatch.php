<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = ['event_id','worker_id','accepted'];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
