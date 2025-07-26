<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoIdea extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'current_price',
        'risk_level',
        'description',
    ];
}
