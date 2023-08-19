<?php

namespace App\Helper;
use App\Models\Brand;
use Flash;
use Symfony\Component\HttpFoundation\Response;

class FuncLib
{

    public static function data_tree(array $data, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                $child = FuncLib::data_tree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
                unset($data[$item['id']]);
            }
        }
        return $result;
    }

    public static function success($code = Response::HTTP_OK, $name = '', $return = '', array $data = null)
    {
        if (!empty($data)) {
            foreach ($data as $key => $item) {

            }
        }
        if ($code == Response::HTTP_NOT_FOUND) {
            return  Flash::error('Not Found');
        }
        Flash::success($name. ' saved successfully.');

        return redirect(route($return. '.index'));
    }

    public static function getBrands()
    {
        $listBrands = Brand::all();
        return $listBrands;
    }
}
