<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    static public function getSingle($id)
    {
        return self::find($id);
    }
    public function getImageUrlAttribute()
    {
        if (!empty($this->image_path) && file_exists(public_path('upload/item/' . $this->image_path))) {
            return asset('upload/item/' . $this->image_path);
        }

        return asset('upload/item/default.png'); // Default image
    }
    
    use HasFactory;

    protected $fillable = [
        'item_code',
        'item_name',
        'quantity',
        'minimum_qty',
        'image_path',
        'status_id',
        'start_qty',
        'item_category_id'
    ];


   
}
