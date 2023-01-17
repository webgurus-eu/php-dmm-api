<?php

namespace Dmm\Helpers;

use Dmm\HttpClient\Api\AbstractApi;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionException;
use SplFileInfo;

class DiscoverApi
{
    public static function within($dirIterator, $basePath): array
    {
        $apiObjects = [];

        $dirIterator = new RecursiveDirectoryIterator($dirIterator);
        $iterator = new RecursiveIteratorIterator($dirIterator);

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            if ($file->isDir()) {
                continue;
            }

            $position = strpos($basePath, $file->getRealPath());
            $libPath = trim(substr_replace($file->getRealPath(), '', $position, strlen($basePath)), DIRECTORY_SEPARATOR);
            $class = str_replace(DIRECTORY_SEPARATOR, '\\', ucfirst(str_replace('.php', '', $libPath)));


            try {
                $ref = new ReflectionClass($class);
            } catch (ReflectionException $e) {
                continue;
            }

            if (!$ref->isSubclassOf(AbstractApi::class)) {
                continue;
            }

            $apiObjects[strtolower($ref->getShortName())] = $ref->name;


        }


        return $apiObjects;
    }


}
