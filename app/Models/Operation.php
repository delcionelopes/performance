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
        'created_at',
        'updated_at',
    ];

    public function modules(){
        return $this->belongsToMany(Module::class,'modope','module_id','operation_id');
    }

    public function authorization(){
        return $this->hasMany(Authorization::class);
    }
}
