<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\ProductRequest;

interface ProductInterface{
    public function getall();
    public function create(ProductRequest $request);
    public function getone(string $id);
    public function update(ProductRequest $request, string $id);
    public function delete(string $id);
}