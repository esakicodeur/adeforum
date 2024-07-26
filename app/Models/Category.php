<?php

namespace App\Models;

use App\Traits\HasTimesTamps;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use HasTimesTamps;

    protected $fillable = ['name', 'slug'];

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    public function createdAt(): String
    {
        return $this->created_at->format('d-m-Y');
    }
}
