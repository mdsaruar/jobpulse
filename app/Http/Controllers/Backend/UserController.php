<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function UserList()
    {
        // Get all users
        $users = User::with('roles')->get();

        // Show the view
        return view('backend.pages.user.user_all', compact('users'));
    }

    public function CompanyList()
    {
        // Get all users
        $users = User::with('roles')
        ->whereHas('roles', function ($query) {
            $query->where('name', 'company');
        })
        ->get();

        // Show the view
        return view('backend.pages.user.company_list', compact('users'));
    }

    public function create()
    {
        // Show the form to create a new user
        return view('frontend.pages.account.registration');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'type' => 'required|in:company,candidate',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {

            if ($request->input('type') == 'company') {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = 'disabled';
            $user->save();
            $user = User::find($user->id);
            $user->assignRole('company');

            }

            if ($request->input('type') == 'candidate') {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->status = 'enabled';
                $user->save();
                $user = User::find($user->id);
                $user->assignRole('candidate');

                }

            session()->flash('success','You have registerd successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // // Validate input
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:8',
        //     'type' => 'required|in:company,candidate',

        // ]);

        // // Create the user
        // if ($request->input('type') == 'company') {
        //     $user = User::create([
        //         'name' => $request->input('name'),
        //         'email' => $request->input('email'),
        //         'password' => bcrypt($request->input('password')),
        //         'status' => 'disabled',
        //     ]);
        //     $user = User::find($user->id);
        //     $user->assignRole('company');

        // }
        // if ($request->input('type') == 'candidate') {
        // $user = User::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')),
        //     'status' => 'enabled',
        // ]);
        // $user = User::find($user->id);
        // $user->assignRole('candidate');
        // }





        // return response()->json(['message' => 'User created successfully.']);
        // return redirect()->route('users.index')->with('success', 'Manager created successfully.');
    }

    public function userLogin()
    {
        return view('frontend.pages.account.login');
    }

    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->hasRole('company')) {
                    return redirect()->route('admin.dashboard');
                }
                if (Auth::user()->hasRole('candidate')) {
                    return redirect()->route('jobs');
                }

            } else {
                return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
            }
        } else {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    public function profile() {


        $id = Auth::user()->id;

        $user = User::where('id',$id)->first();

        return view('frontend.pages.account.profile',[
            'user' => $user
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

    public function AssignRole()
    {
        $user = User::find(2);
        $user->assignRole('user');
    }
}
