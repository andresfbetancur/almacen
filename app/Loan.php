<?php

namespace App;

use App\Laptop;
use App\Instructor;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'is_active','novedad','descripcion','id_laptops','id_instructors'
    ];

    public function laptop(){
        return $this->belongsTo(Laptop::class, 'id_laptops');
    }

    public function instructor(){
        return $this->belongsTo(Instructor::class, 'id_instructors');
    }
}
