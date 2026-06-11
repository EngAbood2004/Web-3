<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];
    //بس بشكل مختصر بدل ما اكتب كل الحقول اللي بدي اياها تكون قابلة للتعبئة
    // protected $fillable = [
    //     'user_id',
    //     'bio',
    //     'phone',
    //     'address',
    //     'date_of_birth'
    // ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
