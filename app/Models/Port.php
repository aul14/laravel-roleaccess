<?php

namespace App\Models;

use App\Models\City;
use App\Models\Simbol;
use App\Models\Country;
use App\Models\NoOfDay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Port extends Model
{
    use HasFactory;

    protected $with = ['country'];

    public function detail_port_city()
    {
        return $this->hasMany(DetailPortCity::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($port) { // before delete() method call this
            $port->detail_port_city()->each(function ($detail_port_city) {
                $detail_port_city->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
