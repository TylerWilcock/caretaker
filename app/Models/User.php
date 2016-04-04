<?php

namespace App\Models;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function getCareRecipients($ctID)
    {
        $carerecipients = DB::table('users as u')->join('cr_ct_link as link', 'u.id', '=', 'link.caretaker_id')
                                        ->join('carerecipients as cr', 'link.carerecipient_id', '=', 'cr.id')
                                        ->where('u.id', '=', $ctID)
                                        ->select('cr.id', 'cr.full_name', 'cr.birthday', 'cr.phone', 'cr.emergency_contact_phone', 'cr.notes', 'cr.primary_doctor_phone')
                                        ->get();

        if(!empty($carerecipients))
        {
            return $carerecipients;
        }
        else
        {
            return 0;
        }
    }
}
