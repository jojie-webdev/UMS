<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Note extends Model
{
    protected $fillable = [
        'title', 'body',
    ];

    public function user()
    {
        $this->belongsTo('App\User', 'id');
    }

    public function getNoteUsername()
    {
        return User::where('id', $this->user_id)->first()->name;
        // $notes = DB::table('notes')->where("user_id", "=", $user->id)->get();
        // return view('notes.add_note', ['notes' => $notes]);
    }
}
