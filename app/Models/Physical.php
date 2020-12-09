<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Physical extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'cnpj',
        'name',
        'email',
        'contact',
        'cep',
        'city',
        'address',
        'street',
        'number',
    ];

    public function setUserId($value)
    {
        $this->user_id = $value;
    }
    public function getUserId(): string
    {
        return $this->user_id;
    }

    public function setCpf($value)
    {
        $this->cpf = $value;
    }
    public function getCpf(): string
    {
        return $this->cpf;
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

    public function setCep($value)
    {
        $this->cep = $value;
    }
    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCity($value)
    {
        $this->city = $value;
    }
    public function getCity(): string
    {
        return $this->city;
    }

    public function setAddress($value)
    {
        $this->address = $value;
    }
    public function getAddress(): string
    {
        return $this->address;
    }

    public function setStreet($value)
    {
        $this->street = $value;
    }
    public function getStreet(): string
    {
        return $this->street;
    }

    public function setNumber($value)
    {
        $this->number = $value;
    }
    public function getNumber(): string
    {
        return $this->number;
    }



    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
