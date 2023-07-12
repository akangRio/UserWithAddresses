<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers =  Customer::with('addresses')->paginate(10);
        
        return response()->json([
            'data'=> $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'photo' => $request->photo,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);
        
        return response()->json([
            'data'=>$customer
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'data'=> $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->photo = $request->photo;
        $customer->email = $request->email;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->gender = $request->gender;
        $customer->dob = $request->dob;
        $customer->save();
        return response()->json([
            'data'=> $customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'message'=> 'customer deleted'
        ],204);
    }
}
