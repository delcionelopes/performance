<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roule extends Model
{
    use HasFactory;
    protected $table = 'roules';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',        
        'name',        
        'created_at',
        'updated_at',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function authorization(){
        return $this->hasMany(Authorization::class);
    }


}
