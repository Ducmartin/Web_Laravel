<?php

namespace App\Http\Controllers;

use App\User;
use App\Model_has_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    //
    function validation(Request $request){
        $request->validate(
            [
                'username' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'role'=>['required'],
                // 'fullname'=>['required','min:12']
            ],
            [
                    'required'=>' Không được để trống :attribute',
                    'unique'=>'Email đã tồn tại trong hệ thống',
                    'password.min'=>'Mật khẩu có ít nhất 8 kí tự',
                    'username.max'=>'Mật khẩu có nhiều nhất 255 kí tự', 
                    'email.max'=>'Email có nhiều nhất 255 kí tự', 
                    'role.in'=>'Không được để trống :attribute',
                    // 'fullname.min'=>'Họ và tên phải chứa ít nhất 12 ký tự'
            ],
            [
                'username'=>'tên đăng nhập',
                'email'=>'địa chỉ email',
                'password'=>'mật khẩu',
                'role'=>'quyền người đăng ký',
                // 'fullname'=>'họ và tên'
            ]
            );
             $data= $request->input();
           User::create([
            'name' => $data['username'],
            // 'fullname'=>$data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
           
            ]);
        $user=User::where('email',$data['email'])->first();
        $role = Role::where('id',$data['role'])->first();
        $permission = Permission::where('name', $role)->first();
        $role->givePermissionTo($permission);
        $user->assignRole( $role->name);
        return redirect('user/list_user_enable')->with('status','Đã thêm thành công thành viên ');
           
    }
    function update(Request $request,$id){
        $request->validate(
            [
                'username' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'role'=>['in:1,2'],
                'fullname'=>['required','min:12']
            ],
            [
                    'required'=>' Không được để trống :attribute',
                    // 'unique'=>'Email đã tồn tại trong hệ thống',
                    'password.min'=>'Mật khẩu có ít nhất 8 kí tự',
                    'username.max'=>'Mật khẩu có nhiều nhất 255 kí tự', 
                    'email.max'=>'Email có nhiều nhất 255 kí tự', 
                    // 'password.confirmed'=>'Vui lòng nhập lại mật khẩu ',
                    'role.in'=>'Không được để trống :attribute',
                    'fullname.min'=>'Họ và tên phải chứa ít nhất 12 ký tự'
            ],
            [
                'username'=>'tên đăng nhập',
                'email'=>'địa chỉ email',
                'password'=>'mật khẩu',
                'role'=>'quyền người đăng ký',
                'fullname'=>'họ và tên'
            ]
            );
           
           User::where('id',$id)->update([
            'name' => $request->username,
            'fullname'=>$request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'=>$request->role,
            ]);
        return redirect('user/list_user_enable')->with('status','Đã chỉnh sửa thành công');
           
    }
    function add(){
        $roles=Role::all();
        return view('admin.user.add',compact('roles'));
    }
    function list_user_enable(){
       $users= User::where('deleted_at',null)->paginate('10');
       $users_enable=count( User::where('deleted_at',null)->get());
       $users_disable=count(User::onlyTrashed()->get());
       $roles=Model_has_role::all();
        return view('admin.user.list_user_enable',compact('users','users_enable','users_disable','roles'));
    }
    function list_user_disable(){
        $users= User::onlyTrashed()->paginate('10');
        $users_enable=count( User::where('deleted_at',null)->get());
        $users_disable=count(User::onlyTrashed()->get());
        $roles=Model_has_role::all();
         return view('admin.user.list_user_disable',compact('users','users_enable','users_disable','roles'));
     }
    function delete($id){
        User::find($id)->delete();
        return redirect()->route('user.list_user_enable');
    }
    function permanently_delete($id){
        User::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('user.list_user_disable');
    }
    function restore($id){
        User::onlyTrashed()->where('id',$id)->restore() ;
        return redirect()->route('user.edit',$id);
   }
   function edit($id){
      $user= User::find($id);
    //   return $user->name;
      return view('admin.user.edit',compact('user'));
   }
   function search(Request $request){
    // return $request->search;
    $search = $request->search;
    $users_enable=count( User::where('deleted_at',null)->get());
    $users_disable=count(User::onlyTrashed()->get());
    $users = User::withTrashed()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('fullname', 'LIKE', "%{$search}%")
        ->paginate(10);
     $roles=Model_has_role::all();
    return view('admin.user.list_user_search',compact('users','search','users_enable','users_disable','roles'));
         }
  
}
