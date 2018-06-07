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
    return Appointment::create($request->all);
});

Route::put('appointments/{id}', function(Request $request, $id) {
    $appointment = Appointment::findOrFail($id);
    $appointment->update($request->all());

    return $appointment;
});

Route::delete('appointments/{id}', function($id) {
    Appointment::find($id)->delete();

    return 204;
});