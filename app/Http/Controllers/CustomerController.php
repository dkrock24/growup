<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = User::all()->where('role_id','2');
        return view('customer/index', [
            'activeMenu' => 'Customers',
            'customers' => $result
        ]);
    }

    public function show($id) {

        $customer = User::find($id);
        $jobs = Job::Where(['customer'=> $id])->get();


        $dataJobs = [
            'activeJobs'=> 0,
            'inactiveJobs'=> 0,
            'totalJobs'=> 0,
        ];

        foreach ($jobs as $key => $job) {
            if ($job->status == 0) {
                $dataJobs['activeJobs'] = $dataJobs['activeJobs']+1;
            }

            if ($job->status == 1) {
                $dataJobs['inactiveJobs'] = $dataJobs['inactiveJobs']+1;
            }
        }
        $dataJobs['totalJobs'] = $dataJobs['activeJobs'] + $dataJobs['inactiveJobs'];

        return view('customer/create', [
            'activeMenu' => 'Customers',
            'customers'=> 0,
            'customer'=> $customer,
            'totals' => $dataJobs
        ]);
    }

    public function edit($id) {
        $customer = User::find($id);
        return view('customer/create', [
            'activeMenu' => 'Customers',
            'customer'=> $customer
        ]);
    }

    public function update(Request $request, $id) {
        $customer = User::find($id);
        $data =  $request->all();
        $customer->update($data);

        return redirect('customers')->with('message','Customer has been updated!');
    }

}
