<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storeInventoryRequest;
use App\Models\inventory;

class inventoryController extends Controller
{

//    ---------------------------- READ ----------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() //Show all inventory when id is not given
    {
        return inventory::all()->toJson();
    }

//  ---------------------------- Create ----------------------------------

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(storeInventoryRequest $request) //Insert an item in database
    {
        $validateRequest = $request->validated();
        $item = inventory::create($request->all());
        if ($item) {
            return response()->json([
                'data' => [
                    'message' => 'Successfully Inserted On Id = '.$item->id,
                    'attributes' => $item
                ]
            ], 201);
        }
    }


//    ---------------------------- READ ----------------------------------

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) //Show an item when id is given
    {
        $item = inventory::find($id);
        if ($item) {
            return response()->json([$item],200);
        }else{
            return response()->json([
                'Message'=>'Item Not Found'
            ],404);
        }
    }

//    ---------------------------- UPDATE ----------------------------------

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(storeInventoryRequest $request, $id) //Update an item using id
    {
        $item = inventory::find($id);
        if ($item){
            $validateRequest = $request->validated();
            $updateItem = $item->update([
                'name'=>$request->name,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                'category'=>$request->category
            ]);

            if ($updateItem){
                return response()->json([
                    'data' => [
                        'message' => 'Successfully Updated Id = '.$id,
                        'attributes' => $item
                    ]
                ], 200);
            }
        }else{
            return response()->json([
                'data' => [
                    'message' => 'Item Not Found',
                ]
            ], 404);
        }

    }

//    ---------------------------- DELETE ----------------------------------

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) //Delete an item using id
    {
        $item = inventory::find($id);
        if ($item){
            $item->delete();
            return response()->json([
                'data' => [
                    'message' => 'Item Deleted From Id = '.$id,
                ]
            ], 200);

        }else{
            return response()->json([
                'data' => [
                    'message' => 'Item Not Found',
                ]
            ], 404);
        }
    }
}
