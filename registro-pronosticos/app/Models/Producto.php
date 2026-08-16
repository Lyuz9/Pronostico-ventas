<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $fillable = [
        'pro_nombre',
        'familia_id' // ← Muy importante: la llave foránea
    ];

    // ✅ Relación: Un producto PERTENECE a una familia
    public function familia(): BelongsTo
    {
        return $this->belongsTo(Familia::class);
    }
}
