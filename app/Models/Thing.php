<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Thing extends Model
{
    protected $table = 'thing';
	protected $fillable = ['thing_name', 'description', 'photo', 'status', 'thing_type', 'thing_state','post_id', 'ubication', 'category_id'];

	public static function setImagenArticulo($foto, $actual = false)
    {
        $ruta='/images/articulos/';
        if ($foto) {
            if ($actual) {
            Storage::disk('public')->delete("images/avatar/$actual");
            }
            $imageName = Str::random(20).'.png';
            $imagen = Image::make($foto)->encode('png', 75);
            $imagen->resize(800, 700, function($constraint)
            {
                $constraint->upsize();
            });
            Storage::disk('public')->put("images/articulos/$imageName", $imagen->stream());
            $imageName = $ruta.$imageName;
            return $imageName;
        }else{
            return false;
        }
    }
}
