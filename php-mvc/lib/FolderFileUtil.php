<?php

/**
 * This is a definition of a files helper in a folder.
 * @author Édson Fischborn
 */
interface FolderFileUtilSkeleton {
    public function getFilePath($fileName, $fileExtension = "default"): string;
    public function isValidFile($fileName, $fileExtension = "default"): bool;
}

/**
 * Implementation of FolderFileUtilSkeleton interface.
 * @author Édson Fischborn
 */
class FolderFileUtil implements FolderFileUtilSkeleton {
    private $folderPath = null;
    private const defaultExtension = "php";

    public function __construct($folderPath) {
        $this->folderPath = rtrim($folderPath, '/');
    }

    public function getFilePath($fileName, $fileExtension = self::defaultExtension): string {
        return $this->folderPath . '/'. $fileName . '.' . $fileExtension;
    }

    public function isValidFile($fileName, $fileExtension = self::defaultExtension): bool {
        return file_exists($this->getFilePath($fileName, $fileExtension)) ? true : false;
    } 
}