<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'valor_total',
        'status',
        'detalhes',
    ];

    /**
     * Define a relação: um Pedido pertence a um User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}