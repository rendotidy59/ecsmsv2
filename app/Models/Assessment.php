<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = 'assessments';

    protected $fillable = array_merge(
      ['questionaire_id','assessor_id','summary'],
      // generate field names question1_score … question13_comment
      collect(range(1,13))->flatMap(fn($i) => [
        "question{$i}_score", "question{$i}_comment"
      ])->toArray()
    );

    public function questionaire()
    {
        return $this->belongsTo(Questionaire::class, 'questionaire_id');
    }

    public function assessor()
    {
        return $this->belongsTo(\App\Models\User::class, 'assessor_id');
    }
}
