<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables en masse.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'title',
        'is_done',
        'operation_id',
    ];

    /**
     * Casts des attributs.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'is_done' => 'boolean',
    ];

    // ...vous pouvez ajouter des relations ou des méthodes ici...
}
