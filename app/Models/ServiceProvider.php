<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ServiceProvider extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'description', 'category', 'rating', 'location', 'logo', 'phone_number'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
