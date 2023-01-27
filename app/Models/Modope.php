<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modope extends Model
{
    use HasFactory;
    protected $table = 'modope';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'module_id',
        'operation_id',
    ];

    public function module(){
        return $this->belongsTo(Module::class,'module_id');
    }

    public function operation(){
        return $this->belongsTo(Operation::class,'operation_id');
    }
}
