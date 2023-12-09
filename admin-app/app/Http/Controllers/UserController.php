<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::get();
        return view('admin.users', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::get();
        return view('admin.createUser', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => ['required', 'regex:/^([0]{1}[7-9]{1})([0-9]{8})$/', 'digits:10'],
            'email' => 'required|email|unique:users,email',
            'personal_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

        $imageName = time() . '-' . $request->post('name') . '-' . $request->file('personal_photo')->extension();
        $request->file('personal_photo')->move(public_path('PostsImage'), $imageName);

        $user = User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'personal_photo' => $imageName,
        ]);

        $data  = [];
        $roles = $_POST['roles'];
        foreach($roles as $value){
            array_push($data, array(
                     'user_id'=>$user->id,
                     'role_id'=> $value,
            ));
            }
            UserRole::insert($data);



        return redirect("users")->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userData= User::where('id', '=', $id)->first();
        return view('admin.editUser', compact('userData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => ['required', 'regex:/^([0]{1}[7-9]{1})([0-9]{8})$/', 'digits:10'],
            'email' => 'required|email|unique:users,email',
            'personal_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $id = $request->input('id');
        $imageName = time() . '-' . $request->post('name') . '-' . $request->file('personal_photo')->extension();
        $request->file('personal_photo')->move(public_path('PostsImage'), $imageName);



         User::Where('id','=',$id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'personal_photo' => $imageName,
        ]);



        return redirect("users")->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', '=',$id)->delete();
        return redirect()->back()->with('success','User Delete Successfully');
    }

    public function showDashboard(){
        return view('admin.index');
    }
    public function allUser(){
        $usersWithRoles = User::select('users.id as user_id', 'users.name as user_name', DB::raw('GROUP_CONCAT(roles.name) as roles'))
    ->join('role_user', 'users.id', '=', 'role_user.user_id')
    ->join('roles', 'role_user.role_id', '=', 'roles.id')
    ->groupBy('users.id')
    ->groupBy('users.name')
    ->get(['users.id', 'users.name']);
    return $usersWithRoles;
    }

    public function specificData($id){
        $userspecific = User::select(
            'users.id as user_id',
            'users.name as user_name',
            'users.phone_number',
            'users.email',
            'users.personal_photo',
            'roles.id as role_id',
            'roles.name as role_name'
        )
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
        ->where('users.id', $id)
        ->get();

        return $userspecific;
    }

}
