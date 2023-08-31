<?php

namespace App\Repositories\Interfaces;

interface StudentRepositoryInterface
{
    //  Get_Student
    public function Get_Student();
    //Get Classrooms
    // Get Add Form Student
    // Show_Student
    public function Show_Student($id);
    //Create_Student
    public function Create_Student();
    //Get Store_Student
    public function Store_Student($request);
    // Edit_Student
    public function Edit_Student($id);
    //Update_Student
    public function Update_Student($request);
    //Delete_Student
    public function Delete_Student($request);
    //Upload_attachment
    public function Upload_attachment($request);
    //Download_attachment
    public function Download_attachment($studentsname,$filename);
    //Show_attachment
    public function Show_attachment($studentsname,$filename);
    //Delete_attachment
    public function Delete_attachment($request);
    //Graduated one student
    public function Graduated_one_student($id);
}
