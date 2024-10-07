<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class khachhang extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'khachhang';
    protected $primaryKey = 'MAKH';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'MAKH',
        'HOTEN',
        'GIOITINH',
        'NGAYSINH',
        'DIACHI',
        'SDT',
        'EMAIL',
        'PASSWORD',
        'DIEMTINNHIEM',
        'AVATAR',
        'CCCD',
        'USERNAME',
    ];

    protected $hidden = [
        'PASSWORD', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }
}
