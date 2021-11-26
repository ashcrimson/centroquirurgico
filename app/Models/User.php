<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Models
 * @version November 24, 2021, 12:09 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $bitacoras
 * @property \Illuminate\Database\Eloquent\Collection $especialidades
 * @property \Illuminate\Database\Eloquent\Collection $options
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property \Illuminate\Database\Eloquent\Collection $option1s
 * @property string $username
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $provider
 * @property string $provider_uid
 * @property string $remember_token
 * @property string thumb
 * @property string img
 */
class User extends Authenticatable implements  MustVerifyEmail,HasMedia
{
    use HasApiTokens,Notifiable,InteractsWithMedia,HasRoles,SoftDeletes,HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','provider','provider_uid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['options.children'];

    protected $appends = ['patologias'];

    public function getImgAttribute()
    {
        $media = $this->getMedia('avatars')->last();
        return $media ? $media->getUrl() : asset('dist/img/avatar5.png');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'username' => 'sometimes|required|max:255|unique:users',
        'email'    => 'sometimes|required|email|max:255|unique:users',
        'password' => 'required|min:6',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function options()
    {
        return $this->belongsToMany(\App\Models\Option::class, 'option_user');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    public function getThumbAttribute()
    {
        $media = $this->getMedia('avatars')->last();
        return $media ? $media->getUrl('thumb') : asset('dist/img/avatar5.png');
    }

    public function shortcuts()
    {
        return $this->belongsToMany(Option::class,'user_shortcuts','user_id','option_id');
    }

    public function getAllOptions()
    {
        $opcionesDirectas = $this->options;

        $opcionesPorRol = collect();


        /**
         * @var Role $role
         */
        foreach ($this->roles as $index => $role) {
            $opcionesPorRol = $opcionesPorRol->merge($role->options);
        }

        $allOptions = $opcionesDirectas->merge($opcionesPorRol);


//        dd($this->id,$opcionesDirectas->toArray(),$opcionesPorRol->toArray(),$allOptions->toArray());

        return $allOptions;
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bitacoras()
    {
        return $this->hasMany(\App\Models\Bitacora::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function especialidades()
    {
        return $this->belongsToMany(\App\Models\Especialidad::class, 'especialidad_user');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partes()
    {
        return $this->hasMany(\App\Models\Parte::class, 'user_ingresa');
    }

    public function getPatologiasAttribute()
    {
        $patologias = collect();

        foreach ($this->especialidades as $index => $especialidad) {
            $patologias = $patologias->merge($especialidad->patologias);
        }

        return $patologias;
    }

}
