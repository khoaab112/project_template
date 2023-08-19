<?php

namespace App\Services;


use App\Models\Page_News;
use Illuminate\Support\Facades\Storage;

Class FileUploadService
{
    /**
     * @param $file
     * @param $path
     * @param array $options
     * @return array
     */
    public function upLoadImages($file, $path, $options = [])
    {
        $keys = config('image-optimizer.tiny_token');
        $k = array_rand($keys, 1);
        $key = $keys[$k];
        try {
            $imgPath = Storage::putFile($path, $file);
            \Tinify\setKey($key);
            $imgName = last(explode("/", $imgPath));
            $sources = \Tinify\fromFile(storage_path("app/" . $path . "/" . $imgName));
            $sources->toFile(storage_path("app/" . $path . "/" . $imgName));
            if (isset($options["size"])) {
                foreach ($options["size"] as $folder => $size) {
                    $arrayConfig['method'] = 'cover';
                    $width = $size['width'] ?? 0;
                    $height = $size['height'] ?? 0;

                    if (!is_dir(storage_path("app/" . $path . "/" . $folder)))
                        mkdir(storage_path("app/" . $path . "/" . $folder));

                    if ($width == 0 || $height == 0)
                        $arrayConfig['method'] = 'scale';

                    if ($width > 0)
                        $arrayConfig['width'] = (int)$width;

                    if ($height > 0)
                        $arrayConfig['height'] = (int)$height;

                    $sources->resize($arrayConfig)
                        ->toFile(storage_path("app/" . $path . "/" . $folder . "/" . $imgName));
                }
            }
            return [
                "message" => "",
                "path" => $imgPath,
                "status" => true
            ];

        } catch (\Exception $exception) {
            return [
                "message" => $exception->getMessage() . " | " . $exception->getLine(),
                "path" => "",
                "status" => false
            ];
        }
    }

}
