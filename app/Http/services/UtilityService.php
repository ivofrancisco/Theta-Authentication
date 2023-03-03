<?php

namespace App\Http\Services;

class UtilityService
{

    /**
     * Update request service details array.
     *
     * @param $requestItem
     * @param $request
     * @return array
     */
    public function updateServices($requestItem, $request): array
    {
        // Store array values
        $target = [];
        // Update array values
        for ($i = 0; $i < count($requestItem); $i++) {
            $arr['service_name'] = $request['service_name'][$i];
            $arr['service_category'] = $request['service_category'][$i];
            $arr['service_quantity'] = $request['service_quantity'][$i];
            $arr['service_price'] = $request['service_price'][$i];
            $arr['service_subtotal'] = $request['service_subtotal'][$i];
            array_push($target, $arr);
        }
        return $target;
    }

    /**
     * Set request's photos name.
     *
     * @param $photos
     * @return array
     */
    public function getPhotos($photos): array
    {
        // Manage image files
        $mediaService = new MediaService();
        // Store photo names
        $target = [];
        // Loop over photo names
        foreach ($photos as $photo => $value) {
            // Get photos names
            $photo = $mediaService->getMediaFile($value);
            // Add photos (names) into new array
            array_push($target, $photo);
            // Upload photos
            $mediaService->uploadMediaFile($value);
        }
        return $target;
    }
}
