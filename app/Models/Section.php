<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name_Section'];
    protected $fillable=['Name_Section','Grade_id','Class_id','Status'];
    protected $table = 'sections';
    public $timestamps = true;


    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام
    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }
       // علاقة الاقسام مع المعلمين
       public function teachers()
       {
           return $this->belongsToMany('App\Models\Teacher','teacher_section');
       }

       public function Grades()
       {
           return $this->belongsTo('App\Models\Grade', 'Grade_id');
       }
}
