<?php

namespace App\Http\Controllers\Pages;

use App\Facades\Products;
use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;

class ProductPageController extends Controller
{
    public function __invoke(string $slug)
    {
        $product = Products::get($slug);
        abort_if(is_null($product), 404, 'Producto no encontrado');

        $jsonLd = ProductHelper::generateJsonLd($product);

        return view('pages.product', compact('product', 'jsonLd'));
    }
}
