<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pronostico extends Model
{
    protected $fillable = [
        'user_id',
        'familia_id',
        'producto_id',
        'ene',
        'feb',
        'mar',
        'abr',
        'may',
        'jun',
        'jul',
        'ago',
        'sep',
        'oct',
        'nov',
        'dic',
    ];

    // 🔗 Relación: Este pronóstico PERTENECE a un Usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relación: Este pronóstico PERTENECE a una Familia
    public function familia(): BelongsTo
    {
        return $this->belongsTo(Familia::class);
    }

    // 🔗 Relación: Este pronóstico PERTENECE a un Producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}
