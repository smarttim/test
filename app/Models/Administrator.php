<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrators';
    protected $guarded = ['id'];
    public $timestamps = false;
}
