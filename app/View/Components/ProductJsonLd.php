<?php

namespace App\View\Components;

use App\Helpers\ProductHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductJsonLd extends Component
{
    public $jsonLd;

    public function __construct($product)
    {
        $this->jsonLd = json_encode(ProductHelper::generateJsonLd($product), JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    public function render(): View|Closure|string
    {
        return view('components.product-json-ld');
    }
}
