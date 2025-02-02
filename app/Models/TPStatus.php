<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPStatus extends Model
{
    protected $table = 't_p_statuses';

    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];
    public function Tripuser()
    {
        return $this->hasOne(Tripuser::class, 'Tripuser');
    }

    public function Tripuserr()
    {
        return $this->hasOne(Tripuser::class);
    }
}
