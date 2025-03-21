<?php

namespace App\Helpers;

use App\Models\Product;

class ProductHelper
{
    /**
     * @param  Product  $product
     * @return array
     * Esto es una muestra basica
     */
    public static function generateJsonLd(Product $product)
    {
        return [
            "@context" => "https://schema.org/",
            "@type" => "Product",
            "name" => $product->name,
            "image" => url($product->image),
            "description" => $product->description
        ];
    }
}
