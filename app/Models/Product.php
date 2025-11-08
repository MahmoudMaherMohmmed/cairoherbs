<?php

namespace App\Models;

use App\Enums\ProductFeaturedEnum;
use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Concerns\Package\HasTranslations;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'title',
        'code',
        'description',
        'image',
        'featured',
        'status',
    ];

    public $translatable = ['title', 'description'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'title' => 'array',
            'description' => 'array',
            'featured' => ProductFeaturedEnum::class,
            'status' => ProductStatusEnum::class,
        ];
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->slug) && !empty($model->title['en'])) {
                $model->slug = Str::slug($model->title['en']);
            }
        });

        static::updating(function ($model) {
            if (empty($model->slug) && !empty($model->title['en'])) {
                $model->slug = Str::slug($model->title['en']);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }
}
