<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;


class PageController extends Controller
{
    //
    function add(){
        return view('admin.page.add');
    }
    function validation(Request $request){
        $request->validate(
            [
                'title'=>['required','max:255','min:5'],
                'status'=>['required'],
            ],
            [
                'required'=>'Không được để trống :attribute',
                'title.min'=>'Phải có ít nhất 5 ký tự',
            ],
            [
                'title'=>'tiêu đề trang',
                'status'=>'trạng thái của trang'
            ] );
            $data= $request->input();
            Page::create([
             'title' => $data['title'],
             'status_id'=>$data['status'],
             ]);
            
         return redirect('page/list_page')->with('status','Đã thêm 1 trang mới');
    }
    function list(){
       $pages=Page::paginate('10');
       $public=count(Page::where('status_id',2)->get());
        $approve=count(Page::where('status_id',1)->get());
        return view('admin.page.list',compact('pages','public','approve'));
    }
    function delete($id){
      Page::find($id)->delete();
      return redirect('page/list_page')->with('delete','Đã xóa thành công!');
    }
    function edit($id){
       $page= Page::find($id);
        return view('admin.page.edit',compact('id','page'));
    }
    function validation_edit(Request $request,$id){
        $request->validate(
            [
                'title'=>['required','max:255','min:4'],
               
                'status'=>['required'],
            ],
            [
                'required'=>'Không được để trống :attribute',
                'title.min'=>'Phải có ít nhất 5 ký tự',
            ],
            [
                'title'=>'tiêu đề trang',
                'status'=>'trạng thái của trang'
            ] );
           $data= $request->input();
            Page::where('id',$id)->update([
             'title' => $data['title'],
             'status_id'=>$data['status'],
             ]);
             return redirect('page/list_page')->with('edit','Đã chỉnh sửa thành công!');
    }
    function list_page_approve(){
        $pages=Page::where('status_id',1)->paginate(10);
        $public=count(Page::where('status_id',2)->get());
        $approve=count(Page::where('status_id',1)->get());
        return view('admin.page.list',compact('pages','public','approve'));
    }
    function list_page_public(){
        $pages=Page::where('status_id',2)->paginate(10);
        $public=count(Page::where('status_id',2)->get());
        $approve=count(Page::where('status_id',1)->get());
        return view('admin.page.list',compact('pages','public','approve'));
    }
    function search(Request $request){
        $search = $request->search;
       $pages = Page::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->paginate(10);
        $public=count(Page::where('status_id',2)->get());
        $approve=count(Page::where('status_id',1)->get());
        return view('admin.page.list',compact('pages','public','approve'));
    }
}
