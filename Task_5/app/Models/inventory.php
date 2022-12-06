<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory'; //table name in database
    protected $primaryKey = 'id'; //Make id a primary key
    public $incrementing = true; //Auto Increment Id
    protected $fillable = ['id','name','quantity','price','category']; //Column Names
}
