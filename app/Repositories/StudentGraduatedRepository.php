<?php

namespace App\Repositories;

use App\Http\Resources\PromotionResource;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use App\Repositories\Interfaces\StudentGraduatedRepositoryInterface;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{
    //Index StudentGraduate
    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduated.index', compact('students'));
    }
    //Create StudentGraduate
    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Students.Graduated.create', compact('Grades'));
    }
    //SoftDelete StudentGraduate
    public function SoftDelete($request)
    {
        $students = student::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Classroom_id)->where('section_id', $request->section_id)->get();

        if ($students->count() < 1) {
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }
        foreach ($students as $student) {

            student::where('id', $student->id)->Delete();
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('Graduated.index');
    }
    //return to Student To School
    public function ReturnData($request)
    {
        $promotions=Promotion::onlyTrashed()->where('student_id',$request->id)->restore();
        $student=Student::onlyTrashed()->findOrFail($request->id)->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }
    //Delete Student from Database
    public function Delete($request)
    {
        $student=Student::onlyTrashed()->findOrFail($request->id)->forceDelete();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }
}
