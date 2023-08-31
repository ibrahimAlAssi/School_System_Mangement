<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Authenticatable
{

    use HasFactory,SoftDeletes,HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];
     // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

     public function gender()
     {
         return $this->belongsTo('App\Models\Gender', 'gender_id');
     }

     // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

     public function grade()
     {
         return $this->belongsTo('App\Models\Grade', 'Grade_id');
     }


     // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

     public function classroom()
     {
         return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
     }

     // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

     public function section()
     {
         return $this->belongsTo('App\Models\Section', 'section_id');
     }
       // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationalitie','nationalitie_id');
    }
    public function myparent()
    {
        return $this->belongsTo('App\Models\My_Parent','parent_id');
    }
    public function promotions()
    {
        return $this->hasMany('App\Models\Promotion','student_id')->withTrashed();
    }
    public function student_accounts()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');
    }
    public function attendance()
    {
        return $this->hasMany('App\Models\attendance', 'student_id');
    }

}
