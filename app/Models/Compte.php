<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;

    protected $fillable = ['rib', 'solde', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
