<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Client_information;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $users = User::all();
        return view('admin/user/index', ['users' => $users]);
    }
    public function profile()
    {
        return view('admin/user/profile');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin/user/update', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $userInfo = $user->client_information;

        $validatedUser = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id]
        ]);

        $user->update($validatedUser);

        if ($user->isUser()) {
            $validatedInfoUser = $request->validate([
                'address' => ['required', 'string', 'min:5', 'max:255'],
                'city' => ['required', 'string', 'min:3', 'max:75'],
                'zip_code' => ['required', 'string', 'regex:/^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ -]?\d[ABCEGHJ-NPRSTV-Z]\d$/i'],
                'phone_number' => ['required', 'string', 'regex:/^\d?[\s.-]?(\+0?1\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/']
            ]);
            $userInfo->update($validatedInfoUser);
        } else {
            $validatedInfoMod = $request->validate([
                'phone_number' => ['required', 'string', 'regex:/^\d?[\s.-]?(\+0?1\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/']
            ]);

            $userInfo->update($validatedInfoMod);
        }

        return redirect()->route('admin.users')->with('admin', 'Les informations ont été modifiées!');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->isAdmin()) {
            return redirect()->route('admin.users')->with('admin', 'Vous ne pouvez pas supprimer le compte administration');
        } else
            $user->delete();
      

        return redirect()->route('admin.users')->with('admin', 'Le compte a été supprimé!');
    }

    public function register()
    {
        return view('admin/user/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modId = DB::table('types')->select('id')->where('name', "=", 'Mod')->get()->first();

        DB::beginTransaction();

        $validatedUser = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $validatedUserInfo = $request->validate([
            'phone_number' => ['required', 'string', 'regex:/^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/'],
            'address' => ['nullable', 'string', 'min:5', 'max:255'],
            'city' => ['nullable', 'string', 'min:3', 'max:75'],
            'zip_code' => ['nullable', 'string', 'regex:/^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ -]?\d[ABCEGHJ-NPRSTV-Z]\d$/i'],
        ]);

        $client_information = Client_information::Create([
            'phone_number' => $validatedUserInfo['phone_number'],
            'address' => '75 rue Grilleto',
            'zip_code' => 'J1B 2k9',
            'city' => 'Sherbrooke'
        ]);

        User::create([

            'name' => $validatedUser['name'],
            'email' => $validatedUser['email'],
            'password' => Hash::make($validatedUser['password']),
            'type_id' => $modId->id,
            'client_information_id' => $client_information->id,

        ]);

        DB::commit();



        return redirect()->route('admin.users')->with('success', "L'employé a été enregistré!");
    }
}
