<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class NewsController extends Controller {
 
    protected function create(Request $request)
    {
        $cover = '1';
        $i = 0;
        if($request['post_images']){
            foreach($request['post_images'] as $json){
                $image = json_decode($json, true);
                if (preg_match('/^data:image\/(\w+);base64,/', $image['data'])) {
                    $data = substr($image['data'], strpos($image['data'], ',') + 1);
                
                    $data = base64_decode($data);
                    Storage::disk('public')->put($image['name'], $data);
                    if($i == 0){
                        $cover = $image['name'];
                    }
                    $i++;
            }
        }
        return News::create([
            'header' => $request['post_header'],
            'description' => $request['post_description'],
            'cover' => $cover,
            'body' => $request['post_body']
        ]);
    }

    }
    protected function update(Request $request){
        $i = 0;
        if($request['post_images']){
            foreach($request['post_images'] as $json){
                $image = json_decode($json, true);
                if (preg_match('/^data:image\/(\w+);base64,/', $image['data'])) {
                    $data = substr($image['data'], strpos($image['data'], ',') + 1);
                
                    $data = base64_decode($data);
                    Storage::disk('public')->put($image['name'], $data);
                    $i++;
            }
        }
    }
        return News::where('id', $request['id'])->update(['header'=> $request['post_header'], 'description' => $request['post_description'], 'body' => $request['post_body']]);
        // return News::update([
        //     'header' => $request['post_header'],
        //     'description' => $request['post_description'],
        //     'body' => $request['post_body']
        // ])->where('id', '=', $request['id']);
    }
    protected function delete($id){
        News::where('id', $id)->delete();
        return redirect('/');
    }
}