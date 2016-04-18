<?php

namespace App\Models;

use Auth;
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
     'first_name', 'last_name', 'birthday', 'address', 'phone', 'emergency_phone', 'email', 'password'
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


    public static function addCareRecipient($ctID, $crName, $crBirthday, $crHomeAddress, $crPhoneNumber, $crEmergencyContact, $crDrContact, $crNotes)
    {
        $crID = DB::table('carerecipients')->insertGetId(
            ['full_name' => $crName, 'birthday' => $crBirthday, 'address' => $crHomeAddress, 'phone' => $crPhoneNumber, 'emergency_contact_phone' => $crEmergencyContact, 'notes' => $crNotes, 'primary_doctor_phone' => $crDrContact]
        );

        $insertLink = DB::table('cr_ct_link')->insert(
            ['caretaker_id' => $ctID, 'carerecipient_id' => $crID, 'admin' => 1]
        );

        //need to add a row to the cr_ct_link table as well
    }


    public static function getID()
    {
        $id = Auth::user()->id;
        return $id;
    }
}
