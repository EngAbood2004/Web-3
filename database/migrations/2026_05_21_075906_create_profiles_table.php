<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ربط بالبروفايل
            $table->string('bio')->nullable(); // سيرة ذاتية
            $table->string('Phone')->nullable(); // رقم الهاتف
            $table->string('image'); // صورة الملف الشخصي
            $table->string('address')->nullable(); // العنوان
            $table->string('date_of_birth')->nullable(); // تاريخ الميلاد
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
