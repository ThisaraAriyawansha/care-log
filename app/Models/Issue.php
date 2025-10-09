<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issuer_id',
        'total_quantity',
        'issue_date',
    ];

    // Relationship to user (issuer)
    public function issuer()
    {
        return $this->belongsTo(User::class, 'issuer_id');
    }

    // Relationship to issue items (we can add later)
    public function items()
    {
        return $this->hasMany(IssueItem::class);
    }

    
}
