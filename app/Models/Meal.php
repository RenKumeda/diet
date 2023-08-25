<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Meal extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'meal',
        'date',
        'time',
        'calorie',
        'goal',
    ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
