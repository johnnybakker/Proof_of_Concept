<?php

use Illuminate\Http\Request;
Use App\Appointment;
 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('appointments', function() {
    return Appointment::all();
});
 
Route::get('appointments/{id}', function($id) {
    return Appointment::find($id);
});

Route::post('appointments', function(Request $request) {
    $appointment = new Appointment();
    $validator = Validator::make($request->all(), $appointment->rules());
    if ($validator->fails())
    {
        info('You are missing required fields.');
    }
    else {
        if($appointment->isValid())
        {
            $appointment = $request->all();
            unset($appointment->key);
            return Appointment::create($appointment);
        }
        else {
            info('Je kan niet 2 afspraken op dezelfde datum hebben...');
        }
    }
});

Route::put('appointments/{id}', function(Request $request, $id) {
    $appointment = Appointment::findOrFail($id);
    $validator = Validator::make($request->all(), $appointment->rules());

    if ($validator->fails())
    {
        info('You are missing required fields.');
    }
    else 
    {
        if($appointment->isValid())
        {
            $appointment->update($request->all());
        }
        else
        {
            info('Je kan niet 2 afspraken op dezelfde datum hebben...');
        }
    }
    
    return $appointment;
});

Route::delete('appointments/{id}', function($id) {
    Appointment::find($id)->delete();

    return 204;
});