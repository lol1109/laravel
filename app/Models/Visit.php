<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['traffict', 'ip_address', 'mac_addres' , 'target'];
    protected $table = 'visit';
}
