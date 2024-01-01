<?php

namespace App\Http\Controllers;

use App\Http\Helpers\PaginationHelper;
use App\Models\Catalog;
use App\Models\User;
use App\Models\Job;
use App\Models\PaymentMethod;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Auth;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $jobs = Job::where(["status" => 0])->with(['user', 'serviceType'])->orderBy('deadline')->get();
        $JobList = Job::with(['user', 'serviceType'])->orderBy('deadline')->get();
        $pending = $JobList->where('status', 0);
        $ongoing = $JobList->where('status', 1);
        $completed = $JobList->where('status', 2);
        $canceled = $JobList->where('status', 3);

        $showPerPage = 10;
        $paginated = PaginationHelper::paginate($jobs, $showPerPage);

        return view('jobs/index', [
            "jobs" => $paginated,
            "jobList" => $JobList,
            "pending" => $pending,
            "ongoing" => $ongoing,
            "completed" => $completed,
            "canceled" => $canceled,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $detail = Job::find($id)->with(['user', 'serviceType', 'paymentType'])->first();
        $payment_methods = PaymentMethod::Where("status",1)->get();
        $service_type = Catalog::Where("status",1)->get();
        $jobStatus = Job::jobStatus();
       
        return view('jobs/show', [
            "jobs" => 0,
            "job" => $detail,
            'payment_methods'=> $payment_methods,
            'service_type'=> $service_type,
            'jobStatus'=> $jobStatus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job = Job::find($id)->with(['user', 'serviceType', 'paymentType'])->get();

        $services = Catalog::all()->where("status", 1);
        $customer = User::where("id", Auth::user()->id)->first();

        $payment_methods = PaymentMethod::Where("status",1)->get();

        $datetime = new \DateTime(now());
        $datetime->add(new DateInterval("P1D"));
        $deadline = $datetime->format('Y-m-d 08:00:00');


        return view('services/update', [
            'job'=> $job,
            'services'=> $services,
            'customer'=> $customer,
            'deadline'=> $deadline,
            'payment_methods'=> $payment_methods
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        $data =  $request->all();

        
        $job->update($data);
        return redirect('jobs')->with('message', 'Record was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        //
    }
}
