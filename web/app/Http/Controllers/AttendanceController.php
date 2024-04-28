<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\User;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    /**
     * Mark attendance for a user.
     */
    public function mark()
    {
        // Read the users rfid tag from the request
        $rfid = request('rfid');

        // Find the user with the rfid tag
        $user = User::where('card', $rfid)->first();

        // If the user is not found, return an error response
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Check if the user has already checked in
        $attendance = $user->attendances()->today()->checkIn()->first();

        // ASSUMPTION: The user is NOT allowed to check in and out multiple times in a day
        // prevent check in if the user is already checked in and checked out for the day
        // remove this condition if the user is allowed to check in and out multiple times in a day
        if ($attendance && is_null($attendance->check_out)) {
            return response()->json(['message' => 'You have already checked out'], 400);
        }

        // If the user has already checked in, check them out if the check in time is greater than 1 minute
        // Used to prevent accidental check out when checking in and out at the same time
        if ($attendance) {
            if ($attendance->check_in->diffInMinutes(now()) > 1) {
                $attendance->update([
                    'check_out' => now(),
                ]);

                return response()->json(['message' => 'Checked out successfully']);
            }

            return response()->json(['message' => 'You have already checked in'], 400);
        }

        // If the user has not checked in, check them in
        $user->attendances()->create([
            'date' => now(),
            'check_in' => now(),
            'status' => 'present',
        ]);

        return response()->json(['message' => 'Checked in successfully']);
    }

}
