<?php

namespace App\Domain\Products\Services;

use App\Domain\Products\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Paginator;

class ProductServices
{
    /**
     * Get all products with or without filters
     *
     * @param Request $request
     * @return Paginator $products
     */
    public function getFilteredProducts(Request $request): Paginator
    {
        $category = $request->get('category');
        $price = $request->get('price');

        $products = Product::query();

        if ($category) {
            $products->where('category', $category);
        }

        if ($price) {
            $products->where('price', $price);
        }

        return $products->paginate();
    }
}
