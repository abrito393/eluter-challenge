<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemoteAction extends Model
{
    use HasFactory;

    protected $table = 'remote-actions';

    protected $fillable = ['uuid', 'value', 'status', 'timestamp_server'];

    protected $dates = ['timestamp_server'];
}
