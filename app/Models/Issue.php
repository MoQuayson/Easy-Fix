<?php

namespace App\Models;

use App\Helpers\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Issue extends Model
{
    use HasFactory,UsesUUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'gadget_name',
        'gadget_type',
        'description',
        'location',
        'issue_assigned_to'
    ];

    public function Solution()
    {
        return $this->hasOne(Solution::class);
    }
}
