<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable;

    use Searchable;

    public $asYouType = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'google2fa_secret',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'google2fa_secret',
    ];

    /**
     * Ecrypt the user's google_2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function setGoogle2faSecretAttribute($value)
    {
         $this->attributes['google2fa_secret'] = encrypt($value);
    }

    /**
     * Decrypt the user's google_2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function getGoogle2faSecretAttribute($value)
    {
        return decrypt($value);
    }

    /**
     * Get the indexable data array for the model.
     * Run the following command to flush/index
     * php artisan scout:flush App\\User
     * php artisan tntsearch:import App\\User
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();      // indexes all columns

        // $search = collect($this->toArray())->only([     // only index specific columns
        //     'id',
        //     'fio_id',
        //     'f_name',
        //     'l_name',
        //     'store_name',
        //     'email',
        //     'username',
        //     'tm_num',
        //     'username2'
        // ])->toArray();

        return $array;
    }

}
