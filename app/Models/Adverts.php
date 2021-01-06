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
        'profile_id',
        'category_id',
    ];

    public function setDescription($value)
    {
        $this->description = $value;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setProfile($value)
    {
        $this->profile_id = $value;
    }
    public function getProfile(): string
    {
        return $this->profile_id;
    }

    public function setCategory($value)
    {
        $this->category = $value;
    }
    public function getCategory(): string
    {
        return $this->category;
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
        return $this->belongsTo(User::class);
    }
    public function LegalNature()
    {
        return $this->belongsTo(LegalNature::class);
    }
    public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function Views()
    {
        return $this->belongsTo(Views::class);
    }
}
