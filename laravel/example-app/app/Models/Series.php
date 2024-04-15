<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    # campos que eu posso inserir usando 'Series::create($request->all());'
    protected $fillable = ['nome'];

    # sempre que eu buscar uma serie ja vem com as temporadas
    # protected $with = ['temporadas'];

    public function seasons()
    {
        /**
         * estou dizendo que essa série tem muitas temporadas
         * relacionamento de 1 para muitos
         */
        return $this->hasMany(Season::class, 'series_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }
}
