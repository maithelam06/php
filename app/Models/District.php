<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class District extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
    ];
    protected $table = 'districts';
    protected $primaryKey = 'code';
    public $incrementing = 'false';

    public function provices() {
        return $this->belongsTo(Province::class, 'province_code','code');
    }
}
