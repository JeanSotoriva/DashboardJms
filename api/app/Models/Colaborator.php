<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Colaborator extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'matricula';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'matricula',
        'usuario_id',
        'cpf',
        'nome',
        'email',
        'telefone',
        'cargo',
        'funcao',
        'data_nascimento',
        'data_admissao',
        'data_recisao',
        'ativo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'cpf',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_nascimento' => 'datetime',
        'data_admissao' => 'datetime',
        'data_recisao' => 'datetime',
        'ativo' => 'boolean'
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    }
    public function timestamp()
    {
        return $this->hasMany(Timestamp::class);
    }
}
