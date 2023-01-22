<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function blogType(){
        return $this->belongsTo(BlogType::class);
    }
    public function blogContents(){
        return $this->hasMany(BlogContent::class);
    }
}
