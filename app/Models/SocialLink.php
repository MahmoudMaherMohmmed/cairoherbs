<?php

namespace App\Models;

use App\Enums\SocialLinkStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{
    /** @use HasFactory<\Database\Factories\SocialLinkFactory> */
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'link',
        'icon',
        'class',
        'color',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => SocialLinkStatusEnum::class,
        ];
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function scopeActive($query)
    {
        return $query->where('status', SocialLinkStatusEnum::ACTIVE->value);
    }
}
