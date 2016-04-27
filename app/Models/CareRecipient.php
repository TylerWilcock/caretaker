<?php

namespace App\Models;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Carerecipient extends Authenticatable
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

    public static function getCareTakers($crID)
    {
        $carerecipients = DB::table('carerecipients as cr')->join('cr_ct_link as link', 'cr.id', '=', 'link.carerecipient_id')
                                                           ->join('users as u', 'link.caretaker_id', '=', 'u.id')
                                                           ->where('cr.id', '=', $crID)
                                                           ->select('u.id', 'u.first_name', 'u.last_name', 'u.phone', 'u.emergency_phone', 'u.address', 'u.birthday')
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

    public static function addCareteammate($crID, $email)
    {
        $findCaretaker = DB::table('users')->where('email', '=', $email)
                                           ->select('id')
                                           ->get();

        if(!empty($findCaretaker)) //The email was found in the users table. Now, the link between the care recipient and caretaker
        {
            $insertLink = DB::table('cr_ct_link')->insert(
                ['caretaker_id' => $findCaretaker[0]->id, 'carerecipient_id' => $crID, 'admin' => 0]
            );
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public static function addMedication($crID, $medicationName, $dosage, $prescribedDate, $refillDate)
    {

        $insertMedication = DB::table('medication')->insert(
            ['medication_name' => $medicationName, 'dosage' => $dosage, 'prescribed_date' => $prescribedDate, 'refill_date' => $refillDate, 'carerecipient_id' => $crID]
        );

        if($insertMedication > 0){
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public static function deleteMedication($medID)
    {
        DB::table('medication')->where('med_id', '=', $medID)->delete();
        return 1;
        // $deleteMedication = DB::table('medication')->where('med_id', '=', $medID)
        //                                            ->delete();

        // if($deleteMedication > 0){
        //     return 1;
        // }
        // else
        // {
        //     return 0;
        // }
    }

    public static function updateMedication($editID, $editMedicationName, $editDosage, $editPrescribedDate, $editRefillDate)
    {

        $updateMedication = DB::table('medication')->where('med_id', $editID)
                                                   ->update(['medication_name' => $editMedicationName, 'dosage' => $editDosage, 'prescribed_date' => $editPrescribedDate, 'refill_date' => $editRefillDate]);

        if($updateMedication > 0){
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public static function getMedication($crID)
    {
        $medication = DB::table('medication')->where('carerecipient_id', '=', $crID)
                                             ->select('med_id', 'medication_name', 'dosage', 'prescribed_date', 'refill_date', 'carerecipient_id')
                                             ->get();

        if(!empty($medication))
        {
            return $medication;
        }
        else
        {
            return 0;
        }
    }

    public static function getMessages($crID)
    {

        $messages = DB::table('messages')->select()
                                         ->where('carerecipient_id', $crID)
                                         ->get();

        if(!empty($messages))
        {
            return $messages;
        }                    
        else 
        {
            return 0;
        }          
    }

    public static function addMessage($crID, $ctID, $message)
    {

        date_default_timezone_set('America/Chicago');
    
        $today = date("Y-m-d");

        $time = date("H:i:s");

        $addMessage = DB::table('messages')->insert(
            ['carerecipient_id' => $crID, 'caretaker_id' => $ctID, 'message' => $message, 'time' => $time, 'date' => $today]);


    }

    public static function getNotes($crID)
    {
        $notes = DB::table('notes')->select()
                                   ->where('carerecipient_id', $crID)
                                   ->get();

        if(!empty($notes))
        {
            return $notes;
        }
        else
        {
            return 0;
        }
    }

}