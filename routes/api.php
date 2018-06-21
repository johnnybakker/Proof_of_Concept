<?php

use Illuminate\Http\Request;
use App\Appointment;

Route::middleware('auth:api');

Route::get('appointments', function() {
    return Appointment::all();
});
 
Route::get('appointments/{id}', function($id) {
    return Appointment::find($id);
});

Route::post('appointments', function(Request $request) {
    $appointment = new Appointment();

    $appointment->user_id = $request->get('user_id');
    $appointment->title = $request->get('title');
    $appointment->start_datetime = $request->get('start_datetime');
    $appointment->end_datetime = $request->get('end_datetime');
    $appointment->zipcode = $request->get('zipcode');
    $appointment->address = $request->get('address');
    $appointment->city = $request->get('city');
    $appointment->description = $request->get('description');

    $validator = Validator::make($request->all(), $appointment->rules());
    if ($validator->fails())
    {
        return 'You are missing required fields.';
    }
    else 
    {
        if($appointment->isValid())
        {
            $appointment->save();
            return $appointment;
        }
        else {
            return "Je kan niet 2 afspraken op dezelfde datum hebben...";
        }
    }
});

Route::put('appointments/{id}', function(Request $request, $id) {
    $appointment = Appointment::findOrFail($id);
    $validator = Validator::make($request->all(), $appointment->rules());

    foreach($request->all() as $key => $val){
        if(isset($appointment[$key])) $appointment[$key] = $val;
    }

    if($appointment->isValid())
        $appointment->save();
    else
        return 'Je kan niet 2 afspraken op dezelfde datum hebben...';
    
    return $appointment;
});

Route::delete('appointments/{id}', function($id) {
    Appointment::find($id)->delete();

    return 204;
});