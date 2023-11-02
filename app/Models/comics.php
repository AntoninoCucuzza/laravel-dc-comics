<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comics extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'thumb', 'price', 'sale_date', 'type', 'artists', 'writers'];

    /* protected $casts = [
        'artists' => 'array',
        'writers' => 'array',
    ]; */
}
