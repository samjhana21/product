<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewplaces extends Model
{
    use HasFactory;
    protected $table='viewplaces';
    protected $primaryKey='id';
    protected $fillable=['placename', 'image', 'description'];
}
