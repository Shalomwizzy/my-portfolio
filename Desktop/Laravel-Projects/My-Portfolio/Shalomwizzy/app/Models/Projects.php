<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = "projects";

    protected $fillable = [
        'category_id',
        'image',
        'name',
        'description',
        'ui_ux',
        'front_end',
        'back_end',
        'stack_used',
        'github_link', 
        'live_link', 
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
