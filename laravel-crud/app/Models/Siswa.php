<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nama_belakang','nama_depan','jenis_kelamin','agama','alamat','avatar'];

    public function getAvatar()
    {
        if($this->avatar){
            return asset('images/default.jpg');
        }

        return asset('images/'.$this->avatar);
    }
}
