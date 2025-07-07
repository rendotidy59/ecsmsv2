<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $table = 'contractors';

    protected $fillable = [
      'name','registration_number','province','city',
      'address','contact_person','phone','email','business_field'
    ];

    public function questionaires()
    {
        return $this->hasMany(Questionaire::class, 'contractor_id');
    }
}

