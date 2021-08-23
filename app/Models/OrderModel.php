<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    public function books(){
        return $this->belongsTo(LibraryModel::class, 'member_id');
    }
    use HasFactory;
    public $timestamps = false;
    protected $table = 'books';
}
