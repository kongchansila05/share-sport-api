<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestream extends Model
{
    use HasFactory;
    protected $table = 'livestream';
    protected $fillable = ['id','date','live_id','server_id','title','photo','detail'];
}
