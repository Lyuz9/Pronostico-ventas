<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Familia extends Model
{
    protected $fillable = [
        'fam_nombre'
    ];

    public function productos(): HasMany
    {
        return $this->hasMany('Producto::class');
    }
}
