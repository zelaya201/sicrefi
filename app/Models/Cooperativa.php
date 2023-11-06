<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperativa extends Model
{
    use HasFactory;

    protected $table = 'cooperativa';

    protected $primaryKey = 'id_coop';

    public function creditos() {
      return $this->hasMany(Credito::class, 'id_coop');
    }
}
