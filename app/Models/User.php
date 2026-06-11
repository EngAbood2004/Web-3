<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable // ✅ يجب أن يمتد من Authenticatable وليس Model
{
    use HasApiTokens, HasFactory, Notifiable;//HasApiTokens لإضافة وظائف إدارة الرموز (Tokens) للمستخدم، مما يسمح له بإنشاء وإدارة رموز الوصول (Access Tokens) عند استخدام Laravel Sanctum للمصادقة في تطبيقات API. هذا يتيح للمستخدمين تسجيل الدخول والحصول على رموز وصول لاستخدامها في طلبات API المحمية.
// وهاي لازم أول خطوة أسويها قبل ما أسوي login/logout/register
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [ //تحويل نوع البيانات تلقائيًا عند الوصول إليها أو تخزينها في قاعدة البيانات
        'email_verified_at' => 'datetime',
        'password' => 'hashed', //تشفير كلمة المرور تلقائيًا عند تخزينها في قاعدة البيانات
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
