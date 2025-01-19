<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function galleryDetails()
    {
        return $this->hasMany(GalleryDetail::class);
    }
}
