<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    protected $table = 'questionaire';

    protected $fillable = array_merge(
        ['contractor_id'],
        collect(range(1, 13))->flatMap(fn ($i) => [
            "question{$i}_answer",
            "question{$i}_attachment",
        ])->toArray()
    );

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }

    public function assessment()
    {
        return $this->hasOne(Assessment::class, 'questionaire_id');
    }
}

