<?php

namespace App;

use \Auth;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['user_id', 'title', 'start_datetime', 'end_datetime', 'zipcode', 'address', 'city', 'description', 'created_at', 'updated_at'];

    public function rules() {
        $rules = [
            'title' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'city' => 'required',
            'description' => 'required'
        ];

        return $rules;
    }  

    public function isValid() {        
        if(isset($this["id"]))
            $appointments = Appointment::where('id', "!=" , $this->id)->where('user_id', $this->user_id)->where('start_datetime', $this->start_datetime)->get();    
        else
            $appointments = Appointment::where('user_id', $this->user_id)->where('start_datetime', $this->start_datetime)->get();    
        if (sizeof($appointments) > 0)
        {
            return false;
        }
        else {
            return true;
        }
    }
}
