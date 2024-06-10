<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DokterModel extends Model
{
    protected $table = 'dokter';    
    public $timestamps = false;
    protected $fillable = ['nip','nama','jk','spesialis','tempat_praktek'];
}
