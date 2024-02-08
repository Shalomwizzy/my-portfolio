<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $table = "skills";

    protected $fillable = [
        'category_id',
        'image',
        'name',
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
