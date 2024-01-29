<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Catagory;
use App\Repositories\Interfaces\ProductInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use GeneralTrait;

    private ProductInterface $productrepo;

    public function __construct(ProductInterface $productrepo)
    {
        $this->productrepo = $productrepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $products = $this->productrepo->getall();
            return $this->getData("Products", $products);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try{
            $product = $this->productrepo->create($request);
            return $this->getData("Product Created", $product);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $product = $this->productrepo->getone($id);
            return $this->getData("Product", $product);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        try{
            $product = $this->productrepo->update($request,$id);
            return $this->getData("Product Updated", $product);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->productrepo->delete($id);
            return $this->deleteData("Product Deleted");
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
