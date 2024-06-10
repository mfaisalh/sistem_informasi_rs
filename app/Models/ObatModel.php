<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    public $timestamps = false;
    protected $fillable = ['kode_obat', 'nama_obat', 'bentuk', 'berat', 'kemasan'];
}
