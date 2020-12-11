<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'type',
    ];
    public function setType($value)
    {
        $this->type = $value;
    }
    public function getType(): string
    {
        return $this->type;
    }

    public function adverts()
    {
        return $this->belongsTo('App\Adverts');
    }
}
