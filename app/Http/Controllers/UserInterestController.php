<?php

namespace App\Http\Controllers;

use App\Models\UserInterest;
use App\Http\Requests\StoreUserInterestRequest;
use App\Http\Requests\UpdateUserInterestRequest;
use Illuminate\Http\Request;

class UserInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_interest = UserInterest::all();

        return response()->json(['data' => $user_interest], 200);
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
    public function store(Request  $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'date_of_birth' => 'required|date|before_or_equal:' . now()->subYears(16)->format('Y-m-d'),
            'interest_area' => 'required|string',
            'marketing_updates' => 'required|boolean',
            'correspondence_in_welsh' => 'required|boolean',
            'gps_location' => 'required|string',
        ]);

        $userInformation = UserInterest::create($request->all());

        return response()->json(['message' => 'User information stored successfully', 'data' => $userInformation], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInterest $userInterest)
    {
        //
    }
    public function getGpsData(UserInterest $userInterest)
    {
         $getData = UserInterest::pluck('gps_location')->toArray();

        return response()->json(['data' => $getData],);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserInterest $userInterest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInterestRequest $request, UserInterest $userInterest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInterest $userInterest)
    {
        //
    }
}
