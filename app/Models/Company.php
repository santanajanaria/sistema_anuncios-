<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'cnpj',
        'name',
        'email',
        'contact',
    ];

    public function setUserId($value)
    {
        $this->user_id = $value;
    }
    public function getUserId(): string
    {
        return $this->user_id;
    }

    public function setCnpj($value)
    {
        $this->cnpj = $value;
    }
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function setName($value)
    {
        $this->name = $value;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setContact($value)
    {
        $this->contact = $value;
    }
    public function getContact(): string
    {
        return $this->contact;
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}