<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'icone',
        'created_at',
        'updated_at',
    ];

    public function operations(){
        return $this->belongsToMany(Operation::class,'modope','module_id','operation_id')->withPivot('id');
    }

    public function authorization(){
        return $this->hasMany(Authorization::class);
    }


}
