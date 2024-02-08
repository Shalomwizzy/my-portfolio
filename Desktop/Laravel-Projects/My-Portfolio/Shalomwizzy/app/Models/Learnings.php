<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learnings extends Model
{
    use HasFactory;
     protected $table ="learnings";
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'current_learning',
        'start_date',
        'end_date',
        'status',
        'tags',
        'skills_gained',
        'resources',
        'external_links',
        'rating',
        'image',
    ];

    protected $casts = [
        'external_links' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
