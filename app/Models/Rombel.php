<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = "rombel";

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}
