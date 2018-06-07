<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['user_id', 'title', 'start_datetime', 'end_datetime', 'zipcode', 'address', 'city', 'description', 'created_at', 'updated_at'];
}
