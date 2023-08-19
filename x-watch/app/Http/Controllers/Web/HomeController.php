<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    public function ckFinder(Request $request)
    {
        $request = $request->all();
        $type = $request['type'];
        $funcNum = $request['CKEditorFuncNum'];

        if ($type == 'image') {

            $path = "public/ckeditor";
            $imgPath = Storage::putFile($path, $request['upload']);
            $name = last(explode("/", $imgPath));

            $response = Http::attach('images[0]', file_get_contents(storage_path('app/' . $imgPath)), $name)
                ->withHeaders(['Accept' => 'application/json'])
                ->withToken('9|XrdR5KDLq9qEJu2bp9wCqDpSJyn508u1fz9BtnX3')
                ->post('https://media.vuanem.com/api/upload')
                ->json();

            echo '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $response['data'][0]['url'] . '")</script>';

            die;

        }
    }
}
