<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class Slidercontroller extends Controller
{
    function add()
    {
        return view('admin.slider.add');
    }
    function delete($id)
    {
        Slider::where('id',$id)->delete();
        return redirect()->route('slider.list');
    }
    function list()
    {
        $sliders=Slider::all();
        return view('admin.slider.list',compact('sliders'));
    }
    function validation_slider(Request $request)
    {
        $request->validate(
            [
                'slider' => ['required'],
            ],
            [
                'required' => "Vui lòng chọn :attribute",
            ],
            [
                'slider' => "ảnh slider",
            ]
        );
        if ($file = $request->file('slider')) {
            $name=$file->getClientOriginalExtension();
            if($name=='jpg' || $name=='png'){
              $name = $file->getClientOriginalName();
              $file->move('public/uploads/sliders/', $name);
              $images = 'public/uploads/sliders/' . $name;
              Slider::create([
                  'img'=> $images,
              ]);
              return redirect()->route('slider.list');
            }else{
                return redirect()->route('slider.add')->with('fail','Vui lòng chọn file là 1 hình ảnh!!!');
            }
           
        }
    }
}
