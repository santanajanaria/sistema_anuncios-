<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    use HasFactory;
    protected $fillable = [
        'advert_id',
        'look',
    ];
    public function setAdvert($value)
    {
        $this->advert_id = $value;
    }
    public function getAdvert(): string
    {
        return $this->advert_id;
    }
    public function setLook($value)
    {
        $this->look = $value;
    }
    public function getLook(): string
    {
        return $this->look;
    }
    public function Adverts()
    {
        return $this->belongsTo(Adverts::class);
    }
}
