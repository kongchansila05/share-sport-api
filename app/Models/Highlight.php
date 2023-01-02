<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;
    protected $table = 'highlight';
    protected $fillable = ['id','date','title','category','video','photo','detail'];
    public function category_name()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}
