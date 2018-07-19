<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

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

        $user = Session::get('user');

        if(isset($user->sr_id)){


            // $results = DB::select("SELECT created_at,
            //                     CASE WHEN points_earned IS NOT NULL THEN 'Points Earned' ELSE 'Points Redeemed' END AS 'desc',
            //                     CASE WHEN points_earned IS NOT NULL THEN points_earned ELSE points_redeemed END AS 'qty',
            //                     IFNULL((SELECT SUM(points_earned) - SUM(points_redeemed) FROM sales_reps_points where id <= p.id), points_earned) AS 'balance'
            //                     FROM sales_reps_points p
            //                     WHERE sr_id = '$user->sr_id' ORDER BY created_at DESC");

            $request = request();
            $results = \App\User::arrayPaginator($results, $request);

            // echo '<pre>';
            // var_dump($results);
            // echo '</pre>';

            // return $results->items();
            return $results;

        }

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
