<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\UploadRequestUpdate;
use App\Http\Requests;
use App\Picture;
use Image;
use Input;
use File;
use Session;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages= Picture::all();
        return view('uploaded.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('uploaded.create');

      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        // dd($request);
      $imagesname= $request->file('foto')->getClientOriginalName();  
  
   // dd($imagesname);
       $pages = new Picture([
       'deskripsi'=> $request->get('deskripsi'),
       'foto'=> $imagesname
   ]);
       $pages->save();

//define the image paths


   $directory = public_path()."/upload_gambar/".$pages->id;
    
    if(!file::exists($directory)){
    file::makeDirectory($directory,$mode=0777,true,true);
                     }

   // $img=
   Image::make($request->file('foto')->getRealPath())->resize(300, null, function ($constraint) {$constraint->aspectRatio();})->save($directory."/thumb_".$imagesname);

   Image::make($request->file('foto')->getRealPath())->save($directory."/ori_".$imagesname);
     return redirect()->route("upload.index");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = Picture::find($id);

    return view('uploaded.show')->with('pages', $pages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
         $picture= Picture::find($id);

    return view('uploaded.edit')->with('picture', $picture);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadRequestUpdate  $request, $id)
    {

         if($request->file('foto')){
            $pages =  Picture::find($id);
            $directory = public_path()."/upload_gambar/".$pages->id;
       File::deleteDirectory($directory);

             $imagesname= $request->file('foto')->getClientOriginalName();
             // dd($imagesname);
       
       $pages->update([
       'deskripsi'=> $request->get('deskripsi'),
       'foto'=> $imagesname
   ]);
       // dd($pages);

             file::makeDirectory($directory,$mode=0777,true,true);
                     

   // $img=
   Image::make($request->file('foto')->getRealPath())->resize(300, null, function ($constraint) {$constraint->aspectRatio();})->save($directory."/thumb_".$imagesname);

   Image::make($request->file('foto')->getRealPath())->save($directory."/ori_".$imagesname);
     return redirect()->route("upload.index");
         } else{
            $imagesname="";
            $pages = Picture::find($id)->update($request->all());
         }
  
   
       // $pages->save();

        

        Session::flash("notice", "Picture success updated");
        return redirect()->route("upload.show", $id)->with('pages', $pages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $pages =  Picture::find($id);
            $directory = public_path()."/upload_gambar/".$pages->id;
       File::deleteDirectory($directory);
         Picture::destroy($id);

    Session::flash("notice", "Picture success deleted");

    return redirect()->route("upload.index");
    }
}
