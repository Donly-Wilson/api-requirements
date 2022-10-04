<?php

namespace App\Domain\Products\Http\Controllers;

use App\Domain\Products\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use App\Domain\Products\Services\ProductServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        // Get all products with or without filters
        $productsAfterFiltered = (new ProductServices())->getFilteredProducts($request);

        // Get products with applied discounts
        $productsAfterDiscounts = ProductResource::collection($productsAfterFiltered);

        return response()->json($productsAfterDiscounts);
    }
}

/*
*You can store the products as you see fit (json file, in memory, rdbms of choice)
*Products in the "insurance" category have a 30% discount. ✅
*The product with sku = 000003 has a 15% discount. ✅
*Provide a single endpoint. GET /products. ✅
*Can be filtered by category as a query string parameter. ✅
*(optional) Can be filtered by price as a query string parameter, this filter applies before discounts are applied. ✅
*Returns a list of Products with the given discounts applied when necessary Product model. ✅
*price.currency is always EUR. ✅
*When a product does not have a discount, price.final and price.original should be the same number and discount_percentage should be null. ✅
*When a product has a discount, price.original is the original price, price.final is the amount with the discount applied and discount_percentage represents the applied discount with the % sign. ✅
*/