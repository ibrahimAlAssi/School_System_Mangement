<?php

namespace App\Repositories\Interfaces;

interface StudentGraduatedRepositoryInterface
{
    //Show Graduated Student
    public function index();
    //Create Graduated Student
    public function create();
    //move to Grauduated list
    public function SoftDelete($request);
    //return to Student To School
    public function ReturnData($request);
    //Delete Student from Database
    public function Delete($request);
}
