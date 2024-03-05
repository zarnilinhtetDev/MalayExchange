<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Credit;
use Illuminate\Http\Request;
use App\Models\UploadCoinHistory;

use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function user_register()
    {

        $showUser_datas =  User::latest()->get();

        return view('blade.user', compact('showUser_datas'));
    }

    public function user_store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/^[a-zA-Z0-9_.+-]+@gmail.com$/i',
            'password' => 'required',
            'type' => 'required',
            'level' => 'required'
        ]);
        $existingUser = User::where('email', $data['email'])->first();
        // return $data['userRole'];

        if ($existingUser) {
            return redirect()->back()->with('error', 'Email address already exists.');
        } else {
            // dd($request->input('userRole', true));
            // var_dump($request->input('userRole', true));
            // return $request->userRole;
            // User::create([
            //     'name' => $data['name'],
            //     'email' => $data['email'],
            //     // 'is_admin' => $request['userRole'],
            //     // 'is_admin' => $request->userRole,
            //     'is_admin' => $request->input('userRole', true),
            //     'password' => Hash::make($data['password']),

            // ]);
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->type = $data['type'];
            $user->level = $data['level'];
            $user->password = Hash::make($data['password']);
            $user->save();



            return redirect()->back()->with('success', 'User registration is successful');
        }
    }

    public function delete_user($id)
    {
        $user_delete = User::find($id);
        $user_delete->delete();

        return redirect()->back()->with('delete_success', ' User delete is successful');
    }
    public function userShow($id)
    {

        $userShow = User::find($id);
        return view('blade.userEdit', compact('userShow'));
    }
    public function update_user(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'userRole' => 'required'
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->name = $data['name'];
        $user->email = $data['email'];



        // Check if a new password is provided, and update the password if needed
        // if ($request->filled('new_password')) {
        //     $user->password = Hash::make($request->input('new_password'));
        // }

        $user->is_admin = $data['userRole'];

        $user->save();

        return redirect('user')->with('success', 'User update is successful');
    }

    public function logout(Request $request)
    {
        // Your logout logic here
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
