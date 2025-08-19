<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    
    public static $rules = array(
        'category_id' => 'required',
    );

    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'content',
        'detail',
    ];

    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }
}
