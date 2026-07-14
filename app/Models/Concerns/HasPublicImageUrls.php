<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasPublicImageUrls
{
    protected function publicImageUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, '/')) {
            return url($path);
        }

        if (Str::startsWith($path, 'storage/')) {
            return asset($path);
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}
