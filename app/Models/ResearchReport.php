<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchReport extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'report', 'status'];

    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}
