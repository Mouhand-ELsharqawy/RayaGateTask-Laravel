<?php

namespace App\Repositories\Patterns;

use App\Http\Requests\CatagoryRequest;
use App\Models\Catagory;
use App\Repositories\Interfaces\CatagoryInterface;

class CatagoryRepository implements CatagoryInterface {
    public function getall()
    {
        $catagories = Catagory::paginate(6);
        return $catagories;
    }

    public function create(CatagoryRequest $request)
    {
        $catagory = Catagory::create($request->all());
        return $catagory;
    }

    public function getone(string $id)
    {
        $catagory = Catagory::find($id);
        return $catagory;
    }

    public function update(CatagoryRequest $request, string $id)
    {
        $catagory = Catagory::find($id);

        $catagory->Name = $request->Name;

        $catagory->update();

        return $catagory;

    }

    public function delete(string $id)
    {
        $catagory = Catagory::find($id);
        
        $catagory->delete();
    }
}