<?php

namespace App\Repositories\Patterns;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface {
    public function getall()
    {
        $products = Product::paginate(6);
        return $products;
    }

    public function create(ProductRequest $request)
    {
        $product = Product::create($request->all());
        return $product;
    }

    public function getone(string $id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = Product::find($id);

        $product->Name = $request->Name;
        $product->Price = $request->Price;
        $product->Quantity = $request->Quantity;
        $product->Description = $request->Description;

        $product->update();

        return $product;
    }

    public function delete(string $id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}