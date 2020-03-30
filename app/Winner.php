<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    protected $table = 'winners';
    protected $primaryKey = 'id';
    protected $fillable = ['memberId','member_name','province','prize','prize_id'];
}
