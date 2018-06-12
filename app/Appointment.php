<?php

namespace App;

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
}
