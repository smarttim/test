<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configure extends Model
{
    protected $table = 'configure';
    protected $guarded = ['id'];
    public $timestamps = false;
}
