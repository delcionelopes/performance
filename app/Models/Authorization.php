<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    use HasFactory;
    protected $table = 'authorization';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'modope_operation_id',
        'modope_module_id',
        'modope_id',
        'roules_id',
        'created_at',
        'updated_at',
    ];

    public function operations(){
        return $this->belongsTo(Operation::class,'modope_operation_id');
    }

    public function modules(){
        return $this->belongsTo(Module::class,'modope_module_id');
    }

    public function roules(){
        return $this->belongsTo(Roule::class,'roules_id');
    }
}
