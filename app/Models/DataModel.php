<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    use HasFactory;
    protected $table='data_models';
    protected $fillable=['nama', 'NIS', 'email', 'kelas', 'tempat_lahir', 'tanggal_lahir'];
}
