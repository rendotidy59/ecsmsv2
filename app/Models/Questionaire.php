<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    protected $table = 'questionaire';

    protected $fillable = [
      'contractor_id',
      'question1_answer','question1_attachment',
      // … sampai question13_answer, question13_attachment
    ];

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }

    public function assessment()
    {
        return $this->hasOne(Assessment::class, 'questionaire_id');
    }
}

