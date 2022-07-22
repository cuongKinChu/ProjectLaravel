<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\Customer\CustomerServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    private $customerServices;

    public function __construct(CustomerServices $customerSevices)
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

    //Check login
    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $login = Auth::guard('cus')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'));
        if ($login) {
            session()->put('customer', Auth::guard('cus')->user());
            return redirect()->route('homepage.index');
        }
        return redirect()->back();
    }

    //Logout
    public function logout()
    {
        Auth::guard('cus')->logout();
        session()->forget('customer');
        return redirect()->route('homepage.login');
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
