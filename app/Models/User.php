<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prename',
        'email',
        'profil',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Fonction pour enrégistrer un utilisateur avant de le supprimer
    public function secondModels()
    {
        return $this->hasMany(SecondModel::class);
    }

    // Hook into the 'deleting' event
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Save data in SecondModel
           
                // Save data into another table
                $dataToSave = [
                    'name' => $user->name, // specify the column name and value
                    'prename' => $user->prename,
                    'email' => $user->email,
                    'profil' => $user->profil,
                    'password' => $user->password,
                    // Add other columns and values as needed
                ];

                // Save data to the second table
                Userdelete::create($dataToSave);
            
        });
    }
}
