<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ToolImage extends Model
{
    use HasFactory;
    protected $fillable = ['tool_id', 'image'];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
