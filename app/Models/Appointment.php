<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewBookingNotification;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'service_name', 'service_provider_name', 'service_duration', 'appointment_date', 'appointment_duration', 'appointment_time', 'additional_notes', 'status'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}
