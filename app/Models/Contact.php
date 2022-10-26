<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'title',
        'prefix',
        'sufix',
    ];

    public function phones() {
        return $this->hasMany(PhoneNumber::class)->orderBy('id','desc');;
    }

    public function defaultPhone()
    {
        return $this->hasOne(PhoneNumber::class)->ofMany([
            'id' => 'max',
        ], function ($query) {
            $query->where('is_default', '=', 'Y');
        });
    }
}
