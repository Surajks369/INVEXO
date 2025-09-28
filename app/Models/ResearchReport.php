<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category', 
        'status',
        'nse_code',
        'recommendation',
        'current_price',
        'target_price',
        'potential',
        'expect_hold_period',
        'company_logo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function getCompanyLogoUrlAttribute()
    {
        if ($this->company_logo) {
            return asset('storage/' . $this->company_logo);
        }
        return null;
    }
}
