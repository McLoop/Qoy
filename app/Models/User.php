<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'avatar', 'user_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function setImagen($foto, $actual = false)
    {
        $ruta='/images/avatar/';
        if ($foto) {
            if ($actual) {
            Storage::disk('public')->delete("images/avatar/$actual");
            }
            $imageName = Str::random(20).'.png';
            $imagen = Image::make($foto)->encode('png', 75);
            $imagen->resize(80, 70, function($constraint)
            {
                $constraint->upsize();
            });
            Storage::disk('public')->put("images/avatar/$imageName", $imagen->stream());
            $imageName = $ruta.$imageName;
            return $imageName;
        }else{
            return false;
        }
    }
}
