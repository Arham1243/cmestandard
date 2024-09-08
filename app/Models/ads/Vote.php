<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['participant_id', 'voter_name', 'voter_email']; // Adjust the fillable attributes

    // Define the relationship with the Participant model
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}