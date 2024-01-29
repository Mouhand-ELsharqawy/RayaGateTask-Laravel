<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatagoryRequest;
use App\Repositories\Interfaces\CatagoryInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    use GeneralTrait;

    private CatagoryInterface $catagoryrepo;

    public function __construct(CatagoryInterface $catagoryrepo)
    {
        $this->catagoryrepo = $catagoryrepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $catagories = $this->catagoryrepo->getall();
            return $this->getData("All Catagories", $catagories);
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
    public function store(CatagoryRequest $request)
    {
        try{

            $catagory = $this->catagoryrepo->create($request);
            return $this->getData("Catagory Created", $catagory);

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
            $catagory = $this->catagoryrepo->getone($id);
            return $this->getData("Catagory", $catagory);
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
    public function update(CatagoryRequest $request, string $id)
    {
        try{
            $catagory = $this->catagoryrepo->update($request,$id);
            return $this->getData("Catagory Updated", $catagory);
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
            $this->catagoryrepo->delete($id);
            return $this->deleteData("Catagory Deleted");
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
