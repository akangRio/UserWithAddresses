<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses =  Address::paginate(10);
        return response()->json([
            'data'=> $addresses
        ]);
    }

    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address = Address::create([
            'receiverName' => $request->receiverName,
            'addressName' => $request->addressName,
            'detailAddress' => $request->detailAddress,
            'phoneNumber' => $request->phoneNumber,
            'postcode' => $request->postcode,
            'customer_id' => $request->customer_id,
        ]);
        return response()->json([
            'data'=>$address
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return response()->json([
            'data'=> $address
        ]);
    }

   /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $address->receiverName = $request->receiverName;
        $address->addressName = $request->addressName;
        $address->detailAddress = $request->detailAddress;
        $address->phoneNumber = $request->phoneNumber;
        $address->postcode = $request->postcode;
        $address->customer_id = $request->customer_id;
        $address->save();
        return response()->json([
            'data'=> $address
        ]);
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json([
            'message'=> 'address deleted'
        ],204);
    }
}
