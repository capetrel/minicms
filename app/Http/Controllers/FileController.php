<?php

namespace App\Http\Controllers;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Image;

class FileController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* TODO : delete
    public function postResizeImage(Request $request)
    {

        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension();

        // Traitement de la miniature
        $destinationPath = public_path('/thumbnail_images');
        $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
        $thumb_img->save($destinationPath.'/'.$imagename,80);

        $destinationPath = public_path('/normal_images');
        $photo->move($destinationPath, $imagename);
        return back()
            ->with('success','Image Upload successful')
            ->with('imagename',$imagename);
    }
    */

    public function postWysiwygImage(Request $request) {

        $public_path = 'img/editor/images/';

        $validator = Validator::make($request->all(), [
            'file-0' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()) {
            return response()->json([
                'errorMessage' => 'Mauvais format de fichier ou fichier trop lourd'
            ]);
        } else {
            /*$this->validate($request, [
                   'file-0' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               ]);*/
            $destinationPath = public_path($public_path);
            $file = $request->file('file-0');
            $storedFilename = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $file->move($destinationPath, $storedFilename);
            return response()->json([
                'result' => [
                    [
                        'name' => $storedFilename,
                        'size' => $fileSize,
                        'url' => url('/') . DIRECTORY_SEPARATOR . $public_path . $storedFilename,
                    ]
                ]
            ]);
        }
    }

    public function gallery()
    {
        $data = [];
        $urlPath = DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'editor' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
        $editorPath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'editor';
        $dirContent = scandir($editorPath . DIRECTORY_SEPARATOR . 'images');
        $imageList = array_diff($dirContent, array('..', '.'));
        if (!empty($imageList)) {
             $data["statusCode"] =  200;
             foreach ($imageList as $img) {
                $fileInfo = pathinfo($editorPath . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $img);
                $fileName = ucfirst($fileInfo['filename']);
                $data["result"][]= ["src"=> $urlPath . $fileInfo['basename'], "name"=> $fileName, "alt"=> $fileName, "tag"=> "Image"];
             }
        } else {
            $data["errorMessage"] =  "Il n'y a pas de fichier(s)";
        }

        return \response()->json($data);

    }

}
