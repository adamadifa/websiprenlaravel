<?php

namespace App\Traits;

trait HasAdminStorage
{
    /**
     * Get the full URL for an attribute that represents an image path.
     *
     * @param string|null $path
     * @param string $folder
     * @return string
     */
    public function getAdminImageUrl($path, $folder = '')
    {
        if (!$path) {
            return 'https://placehold.co/400x300?text=No+Image';
        }

        // If it's already a full URL, return it
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        $baseUrl = rtrim(config('app.admin_url', 'http://localhost:8000'), '/');
        $folder = $folder ? trim($folder, '/') . '/' : '';

        return "{$baseUrl}/storage/{$folder}{$path}";
    }
}
