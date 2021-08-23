<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LibraryModel extends Model
{
    public function members(){
        return $this->hasMany(OrderModel::class, 'member_id');
    }
    use HasFactory;
    public $timestamps = false;
    protected $table = 'members';
}
