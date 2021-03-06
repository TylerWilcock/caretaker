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

    public static function deleteCareteammate($crID, $ctID)
    {
        DB::table('cr_ct_link')->where('carerecipient_id', '=', $crID)
                               ->where('caretaker_id', '=', $ctID)
                               ->delete();
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

    public static function deleteMessage($messageID)
    {
        DB::table('messages')->where('id', '=', $messageID)->delete();
        return 1;
    }

    public static function editMessage($messageID, $message)
    {

        $editMessage = DB::table('messages')->where('id', $messageID)
                                                   ->update(['message' => $message]);

        if($editMessage > 0){
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public static function getMessages($crID)
    {

        $messages = DB::table('messages as m')->select('u.id', 'u.first_name', 'u.last_name', 'u.birthday', 'u.address', 'u.phone', 'u.emergency_phone', 'u.email', 'm.id', 'm.carerecipient_id', 'm.caretaker_id', 'm.message', 'm.time', 'm.date')
                                         ->join('users as u', 'm.caretaker_id', '=', 'u.id')
                                         ->where('carerecipient_id', $crID)
                                         ->orderBy('date', 'desc')
                                         ->orderBy('time', 'desc')
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
        $notes = DB::table('notes as n')->select('u.id', 'u.first_name', 'u.last_name', 'u.birthday', 'u.address', 'u.phone', 'u.emergency_phone', 'u.email', 'n.notes_id', 'n.carerecipient_id', 'n.caretaker_id', 'n.note', 'n.time', 'n.date')
                                   ->join('users as u', 'n.caretaker_id', '=', 'u.id')
                                   ->where('carerecipient_id', $crID)
                                   ->orderBy('date', 'desc')
                                   ->orderBy('time', 'desc')
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

    public static function addNotes($crID, $ctID, $note)
    {

        date_default_timezone_set('America/Chicago');
    
        $today = date("Y-m-d");

        $time = date("H:i:s");

        $addNote = DB::table('notes')->insert(
            ['carerecipient_id' => $crID, 'caretaker_id' => $ctID, 'note' => $note, 'time' => $time, 'date' => $today]);

    }

    public static function deleteNote($noteID)
    {
        DB::table('notes')->where('notes_id', '=', $noteID)->delete();
        return 1;
    }

    public static function editNote($noteID, $note)
    {

        $editNote = DB::table('notes')->where('notes_id', $noteID)
                                         ->update(['note' => $note]);

        if($editNote > 0){
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public static function getEvents($crID)
    {
        $events = DB::table('events')->where('carerecipient_id', '=', $crID)
                                     ->select('id', 'carerecipient_id', 'title', 'date', 'time', 'description', 'repeat_id', 'location','notes')
                                     ->get();

        if(!empty($events))
        {
            return $events;
        }
        else
        {
            return 0;
        }
    }

    public static function addEvent($addCRID, $newTitle, $newDescription, $newDate, $newTime, $repeat, $newLocaiton, $newNotes)
    {

        $insertEvent = DB::table('events')->insert(
            ['carerecipient_id' => $addCRID, 'title' => $newTitle, 'date' => $newDate, 'time' => $newTime, 'description' => $newDescription, 'repeat_id' => $repeat, 'location' => $newLocaiton,'notes' => $newNotes]
        );

        if($insertEvent > 0){
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public static function deleteEvent($eventID)
    {
        DB::table('events')->where('id', '=', $eventID)->delete();
        return 1;
    }

    public static function updateEvent($editID, $editTitle, $editDescription, $editDate, $editTime, $repeat, $editLocation, $editNotes)
    {

        $updateEvent = DB::table('events')->where('id', $editID)
                                          ->update(['title' => $editTitle, 'date' => $editDate, 'time' => $editTime, 'description' => $editDescription, 'repeat_id' => $repeat, 'location' => $editLocation,'notes' => $editNotes]);

        if($updateEvent > 0){
            return 1;
        }
        else
        {
            return 0;
        }
    }

}