<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // All of the below is not neccessary, only for information

    // Table name
    protected $table = 'players';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
