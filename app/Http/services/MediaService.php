<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class MediaService
{

    /**
     * Store the media file's
     * original name
     *
     * @var $fileName
     */
    public $fileName;

    /**
     * Get media file's original name
     *
     * @param $mediaFile
     * @return mixed|string
     */
    public function getMediaFile($mediaFile)
    {
        $this->fileName = $mediaFile ? $mediaFile->getClientOriginalName() : 'default_pic.jpg';
        return $this->fileName;
    }

    /**
     * Upload media file
     *
     * @param $mediaFile
     */
    public function uploadMediaFile($mediaFile)
    {
        $mediaFile->storePubliclyAs('images', $this->getMediaFile($mediaFile), 'public');
    }

    /**
     * Remove image file from folder
     *
     * @param $mediaFile
     * @return mixed
     */
    public function removeMediaFile($mediaFile): bool
    {
        if ($mediaFile) {
            return Storage::disk('public')->delete("/images/$mediaFile");
        }
        return false;
    }

    /**
     * Remove multiple image files from folder
     *
     * @param $mediaFile
     * @return mixed
     */
    public function removeMediaFiles($mediaFiles): bool
    {
        if ($mediaFiles) {
            foreach ($mediaFiles as $file) {
                return Storage::disk('public')->delete("/images/$file");
            }
        }
        return false;
    }

    /**
     * Update image file
     *
     * @param $newMediaFile
     * @param $currentMediaFile
     * @return mixed|string
     */
    public function updateMediaFile($newMediaFile, $currentMediaFile)
    {
        // Get media file name
        $fileName = $this->getMediaFile($newMediaFile);
        // Remove old media file from folder
        $this->removeMediaFile($currentMediaFile);
        // Upload new media file
        $this->uploadMediaFile($newMediaFile);

        return $fileName;
    }
}
