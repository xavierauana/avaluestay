<?php
/**
 * Author: Xavier Au
 * Date: 23/8/15
 * Time: 5:08 PM
 */

namespace avaluestay\Services;


use avaluestay\Contracts\MediaInterface;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MediaManagementServices
{
    private $fh;
    private $media;
    private $filePrefix;

    /**
     * MediaManagementServices constructor.
     *
     * @param $fh
     * @param $media
     */
    public function __construct()
    {
        $this->fh = new FileHandler();
        $this->media = App::make(MediaInterface::class);
        $this->filePrefix = time();
    }

    public function saveUploadFile(UploadedFile $file, $filename = null, $directory = null, $propertyId)
    {
        $absolutePath = $this->fh->move($file, $filename, $directory);
        $media = $this->saveToDB($file, $absolutePath, $propertyId);

        return $media;
    }

    private function saveToDB($file, $absolutePath, $propertyId)
    {
        $data = $this->createDbData($file, $absolutePath, $propertyId);

        return $this->media->create($data);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return array
     */
    private function createDbData(UploadedFile $file, $completedPath, $propertyId)
    {
        $data = [];

        $type = $file->getClientMimeType();
        $fileName = $file->getClientOriginalName();

        $data["type"] = $type;
        $data["path"] = $completedPath;

        // TODO: need to fix for different storage location
        $data["link"] = "/files/" . urlencode(str_replace(public_path() . "/files/", "", $completedPath));

        $data["fileName"] = $fileName;
        $data["property_id"] = $propertyId;

        return $data;
    }

    public function getMediaById($id)
    {
        return $this->media->findOrFail($id);
    }

    public function deleteMedia(MediaInterface $media)
    {
        $this->fh->deleteFile($media->path);

        return $media->delete();
    }


}