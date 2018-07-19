<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class User extends Authenticatable
{
    use Notifiable;

    use Searchable;

    public $asYouType = true;

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
     * Generate HTML table using Laravel pagination
     *
     * @return object
     */
    public static function getRepsPointsTransactions(){

        $results = DB::select("SELECT id, name, email, created_at, updated_at FROM users");

        $request = request();
        $results = \App\User::arrayPaginator($results, $request);

        return $results;

    }


    /**
     * Breaks up an array for use with Laravel Pagination
     *
     *
     * @return array
     */
    public static function arrayPaginator($array, $request){

        $page = Input::get('page', 1);
        $perPage = 3;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);

    }


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
