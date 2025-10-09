<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id',
        'item_id',
        'quantity',
    ];

    // Relationships
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
