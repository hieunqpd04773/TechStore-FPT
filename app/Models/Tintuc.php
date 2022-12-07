<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    use HasFactory;
    protected $table = 'tintucs';
    protected $primary = 'id';
    public $timestamps= false;
    protected $fillable=[
        'title','slug','summary','content', 'author', 'tag', 'picture', 'video', 'id_category '
    ];
}
