<?php

namespace App;

use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;
use Illuminate\Support\Facades\DB;

class User extends SparkUser
{

    use CanJoinTeams;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'points'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'two_factor_reset_code',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
        'uses_two_factor_auth' => 'boolean',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function ideas()
    {
        return $this->hasMany('App\Idea');
    }

    public function points($team_id) {
        return DB::table('points')->where('user_id', $this->id)->where('team_id', $team_id)->sum('points');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function questions() 
    {
        return $this->hasMany('App\Question');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
