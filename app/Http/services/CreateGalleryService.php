<?php

namespace App\Http\Services;

class CreateGalleryService
{
    /**
     * Store all request's entries:
     * services
     *
     * @var array
     */
    public $requestItems = [];

    public function getRequestItems($request): array
    {
        // Organize information related
        // to gallery's photos
        $utilityService = new UtilityService();

        // Loop over all request entries
        foreach ($request as $item => $value) {
            // Check for image file
            if ($item == 'photos') {
                // Generate an array from
                // gallery's photos
                $this->requestItems[$item] = $utilityService->getPhotos($value);
            } else {
                // Nor media file or icons found
                $this->requestItems[$item] = $value;
            }
        }
        // New request array with photo
        // fnamesincluded
        return $this->requestItems;
    }

}
