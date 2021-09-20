<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

use Yajra\Datatables\Datatables;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Hash;

use Token;

class UserController extends Controller
{
    //

      public function __construct()
    {
        $this->middleware('auth');
    }

        public function viewroles()
    {
            //    $roles = Role::get();

               $roles = Role::all();//Get all roles

              $permissions = Permission::all();//Get all roles

            return view('admin.role',compact('roles','permissions'));
    }


      public function createuser()
    {
      //Get all users and pass it to the view
         $roles = Role::get(); //Get all roles
      return view('admin.create_user',compact('roles'));
    }

       public function userinfo($id)
    {
      //Get all users and pass it to the view

        $data =User::all()->where('id',$id)->first();

        return $data;
    }


        public function  anyData()
	    {
            $faculties = User::query();
        return Datatables::of($faculties)
            ->addColumn('role', function ($faculties) {
                return $faculties->roles()->pluck('name')->implode(' ,');
        })->addColumn('action', function ($faculties) {

            return '<div class="btn-group" role="group" aria-label="user">
                       <button id="getEditProductData" class="btn btn-xs btn-success  label-sm  open-modalss" value="'.$faculties->id.'"><i class="fa fa-eye"></i></button>
                        <a href="/user_destroy/'.$faculties->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
                      
                    </div>';
              
        })->make(true);
	    }


     public function roles_store(Request $request)
    {
      //Get all users and pass it to the view
       $this->validate($request, [
            'name'=>'required|unique:roles|max:15',
            'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();
    //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
         //Fetch the newly created role and assign permission
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }

        return back()
            ->with('flash_message',
             'Role'. $role->name.' added!');
    }


      public function permissions_store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return back()->with('status','Permission'. $permission->name.' added!');
    }

       public function employee(Request $request)
    {
            return view('admin.employee');
    }


     public function user_update(Request $request)
    {
      $id = $request->input('id');

     // return $id;

          $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields
        // $this->validate($request, [
        //     'name'=>'required|max:120',
        //     'email'=>'required|email|unique:users,email,',
        //
        // ]);
        $input = $request->only(['name', 'email']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

          foreach ($roles as $role)
           {
                 $rol = Role::where('name', '=', $role)->first();
                 if(!empty($rol))
                 {

                     $user->assignRole($role);

                 }

           }
            $user->syncRoles([$roles]);
        return back()->with('status','User successfully edited.');
    }

       public function user_destroy($id)
    {


          $user = User::findOrFail($id); //Get role specified by id
          $user->delete();


        return back()->with('status','User successfully dropped.');
    }

     public function user_store(Request $request)
    {




        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,',

        ]);
          $user = new User(); //Get role specified by id
          $input = $request->only(['name', 'email','password']); //Retreive the name, email and password fields
          $roles = $request['roles']; //Retreive all roles
         $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
         // $user->fill($input)->save();
        //     $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        // $success['name'] =  $user->name;
          foreach ($roles as $role)
           {
                 $rol = Role::where('name', '=', $role)->first();
                 if(!empty($rol))
                 {
                     $user->assignRole($role);
                 }

           }

          //



        return back()->with('status','User successfully Created.');
    }

      #get a compnay
  public function destroy($id)
  {
    $data = Role::findorfail($id);
    $data->delete();
    return back()->with('danger','deleted successfully');

  }
}
