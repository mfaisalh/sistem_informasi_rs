<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PasienModel extends Model
{
    protected $table = 'pasien';    
    public $timestamps = false;
    protected $fillable = ['noreg','nama','jk','tgl_lahir'];
}