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
        'title','slug','tomtat','noidung', 'tacgia', 'ngayguibai', 'luotxem', 'danhgia', 'tag', 'hinhanh', 'video', 'trangthai', 'id_category '
    ];
}
