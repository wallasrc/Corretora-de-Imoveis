<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function papeis()
    {
        return $this->belongsToMany(Papel::class);
    }

    public function adicionaPapel($papel)
    {
        if (is_string($papel)) {
            return $this->papeis()->save(
                Papel::where('nome', $papel)->firstOrFail()
            );
        }

        return $this->papeis()->save(
            Papel::where('nome', $papel->nome)->firstOrFail()
        );
    }


    public function removerPapel($papel)
    {
        if (is_string($papel)) {
            return $this->papeis()->detach(
                Papel::where('nome', $papel)->firstOrFail()
            );
        }

        return $this->papeis()->detach(
            Papel::where('nome', $papel->nome)->firstOrFail()
        );
    }

    public function existePapel($papel)
    {
        if (is_string($papel)) {
            return $this->papeis->contains('nome', $papel);
        }

        return $papel->intersect($this->papeis)->count();
    }

    public function existeAdmin($papel)
    {
        return $this->existePapel('admin');
    }
}
