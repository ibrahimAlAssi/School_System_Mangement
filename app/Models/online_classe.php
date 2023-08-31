<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class online_classe extends Model
{
    use HasFactory;
     //protected $guarded=[];
     public $fillable= ['Grade_id','Classroom_id','section_id','user_id','meeting_id','topic','start_at','duration','password','start_url','join_url','integration','created_by'];

     public function grade()
     {
         return $this->belongsTo('App\Models\Grade', 'Grade_id');
     }


     public function classroom()
     {
         return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
     }


     public function section()
     {
         return $this->belongsTo('App\Models\Section', 'section_id');
     }

     public function user()
     {
         return $this->belongsTo(User::class,'user_id');
     }
}
