<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Marks extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'marks';
    protected $fillable = ['student_id','maths','science','history','term'];

    public function students()
    {
        return $this->hasOne(Students::class,'id','student_id');
    }
}
