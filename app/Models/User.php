<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function specialityInterest()
    {
        return $this->belongsTo(Users_speciality_interests::class, 'speciality_interest_id');
    }

    // Define the relationship to the SpecialityArea model
    public function specialityArea()
    {
        return $this->belongsTo(Users_speciality_areas::class, 'speciality_area_id');
    }

    public function determineBadgeId()
    {
        // Get the total credit hours
        $total_credit_hours = Doctor_activity::where('user_id', $this->id)
            ->whereIn("training_status", ['endorser_approved', 'admin_approved'])
            ->sum('credit_hours');
        // Find the appropriate badge based on the total credit hours
        $badge = Badges::where('min_credit_hours', '<=', $total_credit_hours)
            ->where(function ($query) use ($total_credit_hours) {
                $query->where('max_credit_hours', '>=', $total_credit_hours)
                    ->orWhereNull('max_credit_hours');
            })
            ->orderBy('min_credit_hours', 'desc') // Ensure highest badge is selected
            ->first();

        // Return the badge ID if found
        return $badge ? $badge->id : null;
    }

    public function getBadgeIdAttribute()
    {
        return $this->determineBadgeId();
    }
    public function gettitleFullNameAttribute()
    {
        return $this->academic_title . ' ' . $this->full_name;
    }

    // Define the relationship to the Badge model
    public function badge()
    {
        return $this->belongsTo(Badges::class, 'badge_id');
    }

    public function trainings()
    {
        return $this->hasMany(Doctor_activity::class);
    }
}
