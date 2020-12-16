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
        'tP_Id',
        'photo',
    ];
    public function settPId($value)
    {
        $this->tP_id = $value;
    }
    public function gettPId(): string
    {
        return $this->tP_id;
    }

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
    public function LegalNatures()
    {
        return $this->belongsTo(LegalNature::class);
    }
    public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
