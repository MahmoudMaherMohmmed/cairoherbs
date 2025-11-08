<?php

namespace App\Models;

use App\Enums\SliderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelPackageTools\Concerns\Package\HasTranslations;

class Slider extends Model
{
    /** @use HasFactory<\Database\Factories\SliderFactory> */
    use HasFactory;
    use HasTranslations;

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
            'status' => SliderStatusEnum::class,
        ];
    }
}
