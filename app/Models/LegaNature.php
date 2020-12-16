<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LegalNature extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'cpf',
        'cnpj',
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
    public function setCnpj($value)
    {
        $this->cnpj = $value;
    }
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function cStore($request)
    {
        $novo = new LegalNature();
        $result = $novo->create($request);
        if ($result) {
            return $result;
        }
    }
    public function cUpdate($request)
    {
        $teste = LegalNature::find($request->id);
        $result = $teste->update($request);
        if ($result) {
            return  $result;
        }
    }

    public function adverts()
    {
        return $this->belongsTo('App\Adverts');
    }
}
