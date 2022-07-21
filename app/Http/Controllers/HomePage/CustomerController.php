<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\Customer\CustomerSevices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    private $customerServices;

    public function __construct(CustomerSevices $customerSevices)
    {
        $this->customerServices = $customerSevices;

    }

    //Login screen
    public function index()
    {
        return view('homepage.login', [
            'title' => 'Login to store'
        ]);
    }

    //Logout
    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('homepage.login');
    }

    //Check login
    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required|min:8',
        ]);
        $login = Auth::guard('cus')->attempt($request->only('email','password'));
        if($login){
            return redirect()->route('homepage.index');
        }
        Session::flash('error', 'Email or Password is wrong');
        return redirect()->back();
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('homepage.register', [
            'title' => 'Register'
        ]);
    }

    //Store a newly created resource in storage.
    public function store(CustomerRequest $request)
    {
        try {
            $this->customerServices->insert($request);

            Session::flash('success', 'Register success');
            return redirect()->route('homepage.login');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->route('homepage.register');
        }
    }
}
