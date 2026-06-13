<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run()
{
   {
        // استخدام updateOrCreate لتجنب التكرار
        Student::updateOrCreate(
            ['email' => 'ahmed@example.com'],
            ['name' => 'أحمد محمد', 'phone' => '123456789']
        );

        Student::updateOrCreate(
            ['email' => 'sara@example.com'],
            ['name' => 'سارة علي', 'phone' => '987654321']
        );

        Student::updateOrCreate(
            ['email' => 'mohamed@example.com'],
            ['name' => 'محمد خالد', 'phone' => '555555555']
        );

        Student::updateOrCreate(
            ['email' => 'fatima@example.com'],
            ['name' => 'فاطمة حسن', 'phone' => '111222333']
        );

        Student::updateOrCreate(
            ['email' => 'ali@example.com'],
            ['name' => 'علي رضا', 'phone' => '444555666']
        );

        $this->command->info('✅ Students seeded successfully!');

}
}
}
