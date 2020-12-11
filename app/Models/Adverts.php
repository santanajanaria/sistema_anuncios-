<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adverts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'description',
        'user_id',
        'photo',
    ];

    public function setDescription($value)
    {
        $this->description = $value;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setUser($value)
    {
        $this->user_id = $value;
    }
    public function getUser(): string
    {
        return $this->user_id;
    }

    public function setPhoto($value)
    {
        $this->photo = $value;
    }
    public function getPhoto(): string
    {
        return $this->photo;
    }


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
