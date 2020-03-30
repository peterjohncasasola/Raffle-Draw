<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaffleSetting extends Model
{
    protected $table = "raffle_settings";
    protected $primaryKey = "id";

    protected $fillable = [
        'prize_id','roulette_one','roulette_two','roulette_three','roulette_four'
    ];
}
