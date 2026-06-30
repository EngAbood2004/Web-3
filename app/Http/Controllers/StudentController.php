<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // عرض جميع الطلاب
    public function index()
    {
        $students = Student::all();
        $deletedStudents = Student::onlyTrashed()->get();
        return view('student', compact('students', 'deletedStudents'));  // ✅ تغيير من 'students' إلى 'student'
    }

    // عرض صفحة إضافة طالب جديد
    public function create()
    {
        $students = collect(); // مجموعة فارغة
        return view('student', compact('students'));
    }

    // حفظ طالب جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    // عرض صفحة تعديل طالب
    public function edit(Student $student)
    {
        $students = Student::all();
        return view('student', compact('student', 'students'));
    }

    // تحديث بيانات طالب
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // حذف طالب (Soft Delete)
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

    // استعادة طالب محذوف
    public function restore($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();
        return redirect()->route('students.index')->with('success', 'Student restored successfully!');
    }
}
