<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitController extends Controller
{
    /**
     * Display a listing of the visits.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visit::all();
        return response()->json($visits);
    }

    /**
     * Store a newly created visit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:80',
            'email' => 'required|email|max:150|unique:visits,email',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $visit = Visit::create($request->all());
        return response()->json($visit, 201);
    }

    /**
     * Display the specified visit.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        return response()->json($visit);
    }

    /**
     * Update the specified visit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:80',
            'email' => 'required|email|max:150|unique:visits,email,' . $visit->id,
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $visit->update($request->all());
        return response()->json($visit);
    }

    /**
     * Remove the specified visit from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();
        return response()->json(null, 204);
    }
}
