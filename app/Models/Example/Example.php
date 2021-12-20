<?php

namespace App\Models\Example;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class Example extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'job',
        'address',
        'age',
        'image',
    ];

    protected $appends = [
        'image_post',
    ];

    public function getImagePostAttribute()
    {
        return $this->image ? URL::to('storage/' . $this->image) : null;
    }
}
