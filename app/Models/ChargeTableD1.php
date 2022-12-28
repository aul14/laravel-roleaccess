<?php

namespace App\Models;

use App\Models\Uom;
use App\Models\VatCode;
use App\Models\Currency;
use App\Models\Container;
use App\Models\ChargeCode;
use App\Models\ChargeTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChargeTableD1 extends Model
{
    use HasFactory;

    protected $table = "charge_table_d1";

    protected $with = ['charge_table', 'charge_code', 'uom', 'vat_code', 'container', 'currency'];

    public function charge_table()
    {
        return $this->belongsTo(ChargeTable::class);
    }

    public function charge_code()
    {
        return $this->belongsTo(ChargeCode::class);
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    public function vat_code()
    {
        return $this->belongsTo(VatCode::class);
    }

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
