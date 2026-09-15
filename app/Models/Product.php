<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory, Sluggable;
    protected $table = "products";
    protected $guarded = [];
    protected $appends = ['quantity_check', 'sale_check', 'price_check'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getIsActiveAttribute($is_active)
    {
        return $is_active ? 'فعال' : 'غیر فعال';
    }

    public function scopeFilter($query)
    {

        if (request()->has('attribute')) {
            foreach (request()->attribute as $attribue) {
                $query->whereHas('attributes', function ($query) use($attribue) {
                    foreach (explode('-',$attribue) as $index => $item) {
                        if ($index == 0) {
                            $query->where('value', $item);
                        } else {
                            $query->orWhere('value', $item);
                        };
                    }
                });
            }
        }


        if (request()->has('variation')) {
            $query->whereHas('variations', function ($query) {
                foreach (explode('-', request()->variation) as $index => $variation) {
                    if ($index == 0) {
                        $query->where('value', $variation);
                    } else {
                        $query->orWhere('value', $variation);
                    };
                }
            });
        }
        // dd($query->toSql());
        return $query;
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,);
    }
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class,);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class,);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,);
    }

    public function rates()
    {
        return $this->hasMany(ProductRate::class,);
    }

    public function getQuantityCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->first() ?? 0;
    }

    public function getSaleCheckAttribute()
    {
        return $this->variations()
            ->where('quantity', '>', 0)
            ->where('sale_price', '!=', null)
            ->where('date_on_sale_to', '>', Carbon::now())
            ->orderBy('sale_price')
            ->first() ?? false;
    }

    public function getPriceCheckAttribute()
    {
        return $this->variations()
            ->where('quantity', '>', 0)
            ->orderBy('price')
            ->first() ?? false;
    }
}
