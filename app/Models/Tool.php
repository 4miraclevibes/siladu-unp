<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tool extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'status', 'user_id', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function toolImages()
    {
        return $this->hasMany(ToolImage::class);
    }
}
