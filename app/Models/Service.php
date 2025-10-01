<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // TODO: Define fillable fields for mass assignment

    // TODO: Define provider relationship (belongsTo)


    // TODO: Define category relationship (belongsTo)

    // TODO: Define casts for proper data types
       protected $fillable = ['name', 'description', 'price', 'provider_id', 'category_id', 'status'];

    
    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

  
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected function casts(): array
    {
        return [

        ];
    }
}
