<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Mahasiswa extends Model
{
    protected $table ="mahasiswas";
    public $timestamps=false;
    protected $primaryKey = 'nim';
    /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'jurusan',
        'no_handphone',
        'email',
        'tanggalLahir',
    ];
};

