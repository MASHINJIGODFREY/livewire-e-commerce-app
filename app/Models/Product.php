<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'long_description',
        'regular_price',
        'sale_price',
        'image',
        'images',
        'size',
        'color',
        'status'
    ];

     /**
     * Get the discount percentage for the product.
     *
     * @return float
     */
    protected function getDiscountPercentageAttribute(): Float
    {
        if($this->regular_price > 0){
            return round((((intval($this->regular_price) - intval($this->sale_price)) / intval($this->regular_price))*100), 0);
        }else{
            return 0;
        }
    }

     /**
     * Get the category from which the product belongs.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
