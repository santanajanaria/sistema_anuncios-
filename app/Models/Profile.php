<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'tP_id',
        'user_id',
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

    public function setName($value)
    {
        $this->name = $value;
    }
    public function getName(): string
    {
        return $this->name;
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

    public function cStore($request)
    {
        $novo = new Profile();
        $result = $novo->create($request);
        if ($result) {
            return $result;
        }
    }
    public function cUpdate($request)
    {
        $teste = Profile::where('user_id', $request['user_id'])->first();
        $result = $teste->update($request);
        if ($result) {
            return  $result;
        }
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Adverts()
    {
        return $this->belongsTo(Adverts::class);
    }
    public function LegalNature()
    {
        return $this->belongsTo(LegalNature::class);
    }
}
