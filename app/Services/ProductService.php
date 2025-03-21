<?php

namespace App\Services;

use App\Contracts\ProductContract;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductService implements ProductContract {

    public function get(string $slug)
    {
        return Product::where('slug', $slug)->first();
    }

    public function newest($limit = 4)
    {
        $key = 'newest_products_' . $limit;
        return Cache::rememberForever($key, function () use ($limit) {
            return Product::newest($limit)->get();
        });
    }
}
