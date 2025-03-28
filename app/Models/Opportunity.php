<?php

namespace App\Models;
use App\Models\Organization;
use App\Models\Volunteer;
use App\Models\User;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'cover',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'location',
        'city',
        'state',
        'country',
        'required_volunteers',
        'registered_volunteers',
        'is_remote',
        'status',
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class, 'applications');
    }
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);

    }
}
