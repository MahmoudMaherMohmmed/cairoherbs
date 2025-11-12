<?php

namespace App\Models;

use App\Enums\WebsiteSettingStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelPackageTools\Concerns\Package\HasTranslations;

class WebsiteSetting extends Model
{
    /** @use HasFactory<\Database\Factories\WebsiteSettingFactory> */
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
        'address',
        'sales_email',
        'support_email',
        'sales_phone',
        'support_phone',
        'image',
        'status',
    ];

    public $translatable = ['title', 'description', 'address'];

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
            'address' => 'array',
            'status' => WebsiteSettingStatusEnum::class,
        ];
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function scopeActive($query)
    {
        return $query->where('status', WebsiteSettingStatusEnum::ACTIVE->value);
    }
}
