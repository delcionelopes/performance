<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $table = 'operation';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'icone',
        'route',
        'url',
        'created_at',
        'updated_at',
    ];

    public function modules(){
        return $this->belongsToMany(Module::class,'modope','operation_id','module_id')->withPivot('id');
    }

    public function authorization(){
        return $this->hasMany(Authorization::class);
    }

   
}
