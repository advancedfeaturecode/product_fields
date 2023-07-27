<?php

namespace App\Http\Controllers;

use App\Action\ValidateProductFieldAction;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\CustomField;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request, Product $product, CustomField $productField)
    {
        ValidateProductFieldAction::execute(
            $productField,
            $request->value,
        );

        $product->fields()->attach($productField->id, [
            'value' => $request->value,
        ]);

        return ProductResource::make($product->load('product_fields'));
    }

    public function update(Request $request, Product $product, CustomField $productField)
    {
        ValidateProductFieldAction::execute(
            $productField,
            $request->value,
        );

        $product->fields()->updateExistingPivot($productField->id, [
            'value' => $request->value,
        ]);

        return ProductResource::make($product->load('product_fields'));
    }

    public function destroy(Product $product, CustomField $productField)
    {
        $product->fields()->detach($productField->id);

        return ProductResource::make($product->load('product_fields'));
    }
}
