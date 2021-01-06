<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'advert_id',
        'photo',
    ];
    public function setPhoto($value)
    {
        $this->photo = $value;
    }
    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function Adverts()
    {
        return $this->belongsTo(Adverts::class)->withTrashed();
    }
}
