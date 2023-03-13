<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Client_information;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use GuzzleHttp\Psr7\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'min:5', 'max:255'],
            'city' => ['required', 'string', 'min:3', 'max:75'],
            'zip_code' => ['required', 'string', 'regex:/^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ -]?\d[ABCEGHJ-NPRSTV-Z]\d$/i'],
            'phone_number' => ['required', 'string', 'regex:/^\d?[\s.-]?(\+0?1\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $userId = DB::table('types')->select('id')->where('name', "=", 'user')->get()->first();
        DB::beginTransaction();

        try {
            $client_information = Client_information::Create([
                'phone_number' => $data['phone_number'],
                'address' => $data['address'],
                'zip_code' => $data['zip_code'],
                'city' => $data['city'],
            ]);
            $user =  User::create([

                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'type_id' => $userId->id,
                'client_information_id' => $client_information->id,

            ]);
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
