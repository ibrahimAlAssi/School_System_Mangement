<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $table = 'Grades';
    public $timestamps = true;
    protected $guarded=[];
     // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة
     public function Sections()
     {
         return $this->hasMany('App\Models\Section', 'Grade_id');
     }
}
