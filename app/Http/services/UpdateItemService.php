<?php

namespace App\Http\Services;

class UpdateItemService
{
    /**
     * Store all request's updated
     * entries including media files
     *
     * @var array
     */
    public $updatedItems = [];

    public function getUpdatedItems($request, $entries): array
    {
        // Manage image files
        $mediaService = new MediaService();
        // Loop over all request entries
        foreach ($request as $item => $value) {
            // Check for image file
            if ($item == 'media') {
                // Add media file name to request's array
                $this->updatedItems[$item] = $mediaService->getMediaFile($value);
                // Upload media file
                $mediaService->uploadMediaFile($value);
                // Remove old media file
                $mediaService->removeMediaFile($request['current_photo']);
            } else if ($item == 'icon') {
                // Add icon's name to request's array
                $this->updatedItems[$item] = $value ?? 'image';
            } else {
                // All other request entries
                if (in_array($item, $entries)) {
                    $this->updatedItems[$item] = $value;
                }
            }
        }
        // New request array with
        // media file name included
        return $this->updatedItems;
    }
}
