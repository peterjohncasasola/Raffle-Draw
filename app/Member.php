<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'memberId';

    protected $fillable = [
        'memberId','client_name','client_code','province','province','branch','contact_no','address'
    ];
}
