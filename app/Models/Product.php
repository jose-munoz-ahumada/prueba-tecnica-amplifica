<?php

namespace App\Models;

use App\Models\Concerns\DateSortable;
use App\Models\Concerns\Publishable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, Publishable, DateSortable;

    public $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'weight',
        'height',
        'width',
        'length',
    ];

    protected $appends = ['price_format'];

    public function getPriceFormatAttribute()
    {
        return '$' . number_format($this->price, 0, ',', '.');
    }

    // Para efectos practicos
    public function getTotalWeightAttribute()
    {
        return $this->pivot->quantity * $this->weight . ' kg';
    }

    // Para efectos practicos
    public function getTotalPriceAttribute()
    {
        return '$' . number_format($this->pivot->quantity * $this->price, 0, ',', '.');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_product')
            ->withPivot('quantity');
    }
}
