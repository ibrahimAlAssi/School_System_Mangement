<?php
namespace App\Http\Controllers\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student=$Student;
    }
    public function index()
    {
       return $this->Student->Get_Student();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return $this->Student->Create_Student();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {
       return $this->Student->Store_Student($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $this->Student->Show_Student($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Student->Edit_Student($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentsRequest $request)
    {
        return $this->Student->Update_Student($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }
    public function Upload_attachment(Request $request)
    {
       return $this->Student->Upload_attachment($request);
    }
    public function Download_attachment($studentsname,$filename)
    {
       return $this->Student->Download_attachment($studentsname,$filename);
    }
    public function Show_Attachement($studentsname,$file_name)
    {
       return $this->Student->Show_attachment($studentsname,$file_name);
    }
    public function Delete_attachment(Request $request)
    {
       return $this->Student->Delete_attachment($request);
    }
    public function Graduated_one_student(Request $request)
    {
       return $this->Student->Graduated_one_student($request);
    }
}
