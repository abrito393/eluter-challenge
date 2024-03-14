<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemoteData extends Model
{
    use HasFactory;

    protected $table = 'remote-data';

    protected $fillable = ['value', 'timestamp_server'];

    protected $dates = ['timestamp_server'];


}
