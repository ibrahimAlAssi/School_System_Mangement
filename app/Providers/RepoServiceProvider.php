<?php

namespace App\Providers;

use App\Models\Quizze;
use App\Repositories\ExamRepository;
use App\Repositories\FeesRepository;
use App\Repositories\QuizzRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\StudentRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\AttendanceRepository;
use App\Repositories\FeeInvoicesRepository;
use App\Repositories\ProcessingFeeRepository;
use App\Repositories\ReceiptStudentsRepository;
use App\Repositories\StudentGraduatedRepository;
use App\Repositories\StudentPromotionRepository;
use App\Repositories\Interfaces\ExamRepositoryInterface;
use App\Repositories\Interfaces\FeesRepositoryInterface;
use App\Repositories\Interfaces\QuizzRepositoryInterface;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Repositories\Interfaces\TeacherRepositoryInterface;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;
use App\Repositories\Interfaces\FeeInvoicesRepositoryInterface;
use App\Repositories\Interfaces\LibraryRepositoryInterface;
use App\Repositories\Interfaces\ProcessingFeeRepositoryInterface;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\Interfaces\ReceiptStudentsRepositoryInterface;
use App\Repositories\Interfaces\StudentGraduatedRepositoryInterface;
use App\Repositories\Interfaces\StudentPromotionRepositoryInterface;
use App\Repositories\LibraryRepository;
use App\Repositories\QuestionRepository;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentPromotionRepositoryInterface::class, StudentPromotionRepository::class);
        $this->app->bind(StudentGraduatedRepositoryInterface::class, StudentGraduatedRepository::class);
        $this->app->bind(FeesRepositoryInterface::class, FeesRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
        $this->app->bind(ProcessingFeeRepositoryInterface::class,ProcessingFeeRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class,PaymentRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class,AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class,SubjectRepository::class);
        $this->app->bind(ExamRepositoryInterface::class,ExamRepository::class);
        $this->app->bind(QuizzRepositoryInterface::class,QuizzRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class,QuestionRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class,LibraryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
