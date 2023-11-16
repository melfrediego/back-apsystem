<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{

    public function uploadDz(Request $request){
        $paths = [];

        if ($request->hasFile('file')) {
            $images = $request->file('file');

            foreach ($images as $key=>$image) {
                $imageName = Str::uuid()->toString() . '_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('uploads/produtos', $imageName);
                $paths[$key] = $path;
            }
        }
        return response()->json([$paths]);


        // $url = [];
        // $qtdImg = 0;
        // if ($images){
        //     $imagesUploaded = [];
        //     foreach($images as $key=>$image)
        //     {

        //         //$path = $image->store('uploads/produtos', 'public');
        //         //$originName = $image->getClientOriginalName();
        //         $fileName = $image->getClientOriginalName();
        //         $extension = $image->getClientOriginalExtension();
        //         $fileName = $fileName . '_' . time() . '.' . $extension;
        //         $path = $image->storeAs('uploads/produtos', $fileName, 'public');
        //         $url[$key] = $path;
        //         $qtdImg++;
        //         // $imagesUploaded[] = $path;
        //     }
        // }

        //dd(json_encode($url));

        // return response()->json([
        //     'location'=> $paths,
        //     'files' => $paths,
        //     // 'qtd' => $qtdImg
        // ]); 
    }


    public function uploadTyneMCE(Request $request){

        $originName = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        $path=$request->file('file')->storeAs('uploads/produtos', $fileName, 'public');
        $url = asset("storage/" . $path);
        return response()->json(['location'=> $url]); 

    }

    public function uploadCK(){
        //Configuração CKEDITOR
        // $originName = $request->file('file')->getClientOriginalName();
        // $fileName = pathinfo($originName, PATHINFO_FILENAME);
        // $extension = $request->file('file')->getClientOriginalExtension();
        // $fileName = $fileName . '_' . time() . '.' . $extension;
        // $path=$request->file('file')->storeAs('uploads/produtos', $fileName, 'public');
        // $url = asset("storage/" . $path);
        // return response()->json([
        //     'fileName' => $fileName, 
        //     'uploaded' => 1,
        //     'url' => $url,
        // ]);
    }
}
