<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug','image','status'];

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('status', '=', 1);
    }

    /**
     * Scope a query to only include inactive categories.
     */
    public function scopeInactive(Builder $query): void
    {
        $query->where('status', '=', 0);
    }
}
