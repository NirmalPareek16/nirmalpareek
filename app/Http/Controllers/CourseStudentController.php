<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    public function index()
    {
        $student = Student::create([
            'name' => 'Nirmal Pareek',
            'email' => 'nirmal@gmail.com',
            'password' => 'Nirmal@2024',
            'age' => 23,
            'address' => 'Sardarshahar, Churu'
        ]);
        // dd($student);

        $course = Course::create([
            'course_name' => '2nd Grade',
            'course_type' => 'Reet',
            'class' => '2nd Grade',
            'price' => 20000
        ]);
        // dd($course);

        // $student->courses()->attach([$course->id]);
        // dd($student);
        $studentCourses = $student->courses;
        dd($studentCourses);
    }
}
