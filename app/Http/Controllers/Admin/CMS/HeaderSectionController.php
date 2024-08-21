<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//* Models
use App\Models\Backend\Header;
//* Utilities
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;


class HeaderSectionController extends Controller
{
    //Todo => Index page

    public function index(){
        try{

            $headers = Header::query()->get();
            return view("Backend.pages.CMS.header_section", ["headers"=>$headers]);

        }catch(\Exception $e){
            Log::error("HEADER_CMS_ERROR", $e->getMessage());
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function create(){

        return view("Backend.pages.CMS.add_header");
    }

    public function store(Request $request){
        try{
            $rules = [
                "title"         => "required|string|max:255",
                "content"       =>"required|string",
                "header_image"  =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

            $validation = Validator::make(request()->all(), $rules);
            if($validation->fails()){
                return back()->with('error',$validation->errors()->first())->withInput($request->all());
            }
            $image = $request->file('header_image');
            $imageName = time().".".$image->getClientOriginalExtension();

            //Todo => Define the sizes for the different image versions
            $sizes = [
                'lg' => [1920, 1080],
                'md' => [1280, 720],
                'sm' => [640, 360],
                'xs' => [320, 180],
            ];

            foreach ($sizes as $size => $dimensions) {
                $img = Image::read($image->path());
                $img->resize($dimensions[0], $dimensions[1], function ($constraint) {
                    $constraint->aspectRatio();
                });

                $filePath = "images/$size/$imageName";
                Storage::disk('public')->put($filePath, (string) $img->encode());
            }

            $header = Header::query()->create([
                "title"     =>Str::title($request->title),
                "content"   =>$request->content,
                "image"     =>$imageName
            ]);
            return back()->with("success", "Header Created Successfully");

        }catch(\Exception $e){
            Log::error("HEADER_CMS_ERROR: ". $e->getMessage());
            return redirect()->back()->with("error", "Sorry, Internal Server Error")->withInput(request()->all());
        }
    }

    public function delete($id){
        try{
            $header = Header::query()->where('id',$id)->first();
            if(!$header){
                return back()->with('error','Sorry, Header not found');
            }

            //* Remove image from storage
            $image = $header->image;
            $folders = ['lg', 'md', 'sm', 'xs'];

            foreach ($folders as $folder) {
                $filePath = "images/$folder/$image";
                Storage::disk('public')->delete($filePath);
            }

            $header->delete();
            return back()->with("success", "Header Deleted Successfully");

        }catch(\Exception $e){
            Log::error("HEADER_CMS_ERROR: ". $e->getMessage());
            return back()->with("error","Sorry, Internal Server Error");
        }
    }

    public function edit($id){
        $header = Header::query()->where('id',$id)->first();
        if(!$header){
            return redirect()->route('admin:header:list')->with('error', 'Sorry, Header not found');
        }
        return view("Backend.pages.CMS.header_edit",['header'=>$header]);
    }

    public function update(Request $request, $id){
        try{
            $rules = ["title"=>"required|string|max:255","content"=>"required|string"];

            $validation = Validator::make($request->all(),$rules);
            if($validation->fails()){
                return back()->with('error',$validation->errors()->first())->withInput($request->all());
            }

            //* Find the header
            $header = Header::query()->where("id",$id)->first();
            if(!$header){
                return back()->with('error','Sorry, Header not found')->withInputs(request()->all());
            }

            //* handle if there is an image file coming in
            $imageName = $header->image;

            if(!is_null($request->header_image)){
                $image = $request->file('header_image');
                $imageName = time().".".$image->getClientOriginalExtension();

                //Todo => Define the sizes for the different image versions
                $sizes = [
                    'lg' => [1920, 1080],
                    'md' => [1280, 720],
                    'sm' => [640, 360],
                    'xs' => [320, 180],
                ];

                foreach ($sizes as $size => $dimensions) {
                    $img = Image::read($image->path());
                    $img->resize($dimensions[0], $dimensions[1], function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $filePath = "images/$size/$imageName";
                    Storage::disk('public')->put($filePath, (string) $img->encode());
                }

                //* Remove image from storage
                $image = $header->image;
                $folders = ['lg', 'md', 'sm', 'xs'];

                foreach ($folders as $folder) {
                    $filePath = "images/$folder/$image";
                    Storage::disk('public')->delete($filePath);
                }
            }
            //* Update the header
            $header->update([
                "title"     =>$request->title,
                "content"   =>$request->content,
                "image"     =>$imageName
            ]);
            return back()->with("success","Header Updated Successfully");

        }catch(\Exception $e){
            Log::error("HEADER_CMS_ERROR: ". $e->getMessage());
            return back()->with('error','Sorry, internal Server Error')->withInput($request->all());
        }
    }
}
