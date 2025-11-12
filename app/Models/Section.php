<?php

namespace App\Models;

use App\Enums\SectionStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Concerns\Package\HasTranslations;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
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
            'status' => SectionStatusEnum::class,
        ];
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->slug) && !empty($model->title['en'])) {
                $model->slug = Str::slug($model->title['en']);
            }
        });
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function scopeActive($query)
    {
        return $query->where('status', SectionStatusEnum::ACTIVE->value);
    }
}
