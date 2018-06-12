<?php

namespace App\Http\Controllers;

use App\Appointment;
use \Auth;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('role:admin');
    }

    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view("appointments.index")->with('appointments', $appointments);
    }
    public function create()
    {
        return view("appointments.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'city' => 'required'
        ]);
        
        $appointment = new Appointment();
        $appointment->user_id = Auth::id();
        $appointment->title = $request->get('title');
        $appointment->start_datetime = $request->get('start_datetime');
        $appointment->end_datetime = $request->get('end_datetime');
        $appointment->zipcode = $request->get('zipcode');
        $appointment->address = $request->get('address');
        $appointment->city = $request->get('city');
        $appointment->description = $request->get('description');
        $appointment->save();

        return redirect(route('appointments.index'));
    }

    public function show(Appointment $appointment)
    {
        return view("appointments.show")->with('appointment', $appointment);
    }

    public function edit(Appointment $appointment)
    {
        return view("appointments.edit")->with('appointment', $appointment);
    }

    public function update(Request $request, Appointment $appointment)
    {

        $request->validate([
            'title' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'city' => 'required'
        ]);

        $appointment->title = $request->get('title');
        $appointment->start_datetime = $request->get('start_datetime');
        $appointment->end_datetime = $request->get('end_datetime');
        $appointment->zipcode = $request->get('zipcode');
        $appointment->address = $request->get('address');
        $appointment->city = $request->get('city');
        $appointment->description = $request->get('description');
        $appointment->save();

        return redirect(route('appointments.index'));
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect(route('appointments.index'));
    }
}
