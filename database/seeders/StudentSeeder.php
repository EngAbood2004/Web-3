<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $student1 = Student::create([
            'name' => 'Ahmed',
            'email' => 'ahmed@example.com'
        ]);

        $student2 = Student::create([
            'name' => 'Mohammed',
            'email' => 'mohammed@example.com'
        ]);

        Course::create([
            'student_id' => $student1->id,
            'course_name' => 'Laravel',
            'credit_hours' => 3
        ]);

        Course::create([
            'student_id' => $student1->id,
            'course_name' => 'PHP',
            'credit_hours' => 2
        ]);

        Course::create([
            'student_id' => $student2->id,
            'course_name' => 'Database',
            'credit_hours' => 4
        ]);
    }
}
