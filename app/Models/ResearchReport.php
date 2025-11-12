<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'company_logo',
        'buy_percentage',
        'hold_percentage',
        'sell_percentage'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->public_id)) {
                $model->public_id = (string) Str::uuid();
            }
        });
    }

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

    /**
     * Use public_id for route model binding if needed
     */
    public function getRouteKeyName()
    {
        return 'public_id';
    }
}
