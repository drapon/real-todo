<?php

namespace App\Http\Controllers;

use App\Photo;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;

use Event;
use App\Events\PhotoCreated;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

     protected $photo;
     public function __construct(Photo $photo)
     {
         $this->photo = $photo;
     }

    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->paginate(10);

        return view('photo.index')
        ->with('photos',$photos);
    }

    public function uploadFiles()
    {
      $input = Input::all();

      $rules = array(
          'file' => 'image|max:3000',
      );

      $validation = Validator::make($input, $rules);

      if ($validation->fails()) {
          return Response::make($validation->errors->first(), 400);
      }

      $destinationPath = 'uploads'; // upload path
      $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
      $origin = Input::file('file')->getClientOriginalName(); //origin Name



      $fileName = md5(sha1(uniqid(mt_rand(), true))) . '.' . $extension; // renameing image

      $s3 = App::make('aws')->get('s3');
      $result = $s3->putObject(array(
          'Bucket'     => 's.storeclips.jp',
          'Key'        => $fileName,
          'SourceFile' => Input::file('file')->getRealPath(),
      ));

      $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path

      $width = Image::make($destinationPath.'/'.$fileName)->width();
      $height = Image::make($destinationPath.'/'.$fileName)->height();

      define('IMG_WIDTH', 300);

      $per = IMG_WIDTH / $width;
      $height = $height * $per;

      Image::make($destinationPath.'/'.$fileName)
      ->resize(IMG_WIDTH,$height)
      ->save($destinationPath.'/'.'thumbnail/'.$fileName);

      if ($upload_success) {
          $photos = Photo::create(array('origin' => $origin ,'img_name' => $fileName));
          return Response::json('success', 200);
      } else {
          return Response::json('error', 400);
      }
    }
    public function created(){
      $photo = new Photo;
      $photo->origin = 'abcdefg';
      $photo->img_name = 'test.jp';
      $photo->save();

      return "Saved via Eloquent";
    }
}
