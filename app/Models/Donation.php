<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donator_id',
        'total_quantity',
        'donation_date',
    ];

    // Relationships
    public function donator()
    {
        return $this->belongsTo(User::class, 'donator_id');
    }

    public function items()
    {
        return $this->hasMany(DonationItem::class);
    }

}
