<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','start_date','start_time','end_date','end_time','place','content', 'user_id'];
    
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
