<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propiedades extends Model
{
    use HasFactory;

    protected $table = 'propiedades';
    protected $primaryKey = 'codpro';

    protected $fillable = [
        'titulo',
        'descrip',
        'fotos',
        'habit',
        'baños',
        'metros',
        'parqueo',
        'preven',
        'preren',
        'comision',
        'codcli',
        'codtppro',
        'citbis',
        'estpro',
    ];
}
