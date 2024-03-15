<?php

namespace App\Http\Controllers;

use App\Http\Helpers\PaginationHelper;
use App\Models\Catalog;
use App\Models\Employee;
use App\Models\JobEmployee;
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
        $jobs = Job::where(["status" => 0])->with(['user', 'serviceType'])->orderBy('deadline', 'DESC')->get();
        $JobList = Job::with(['user', 'serviceType'])->orderBy('deadline', 'DESC')->get();
        $pending = $JobList->where('status', 0);
        $ongoing = $JobList->where('status', 1);
        $completed = $JobList->where('status', 2);
        $canceled = $JobList->where('status', 3);

        $showPerPage = 10;
        $page = 1;
        $paginated = PaginationHelper::paginate($JobList, $showPerPage);
        //dd($paginated->getTotal());

        return view('jobs/index', [
            'activeMenu' => 'Jobs details',
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

        $detail = Job::findOrFail($id);
        $detail = $detail->load(['user', 'serviceType', 'paymentType']);

        $payment_methods = PaymentMethod::Where("status",1)->get();
        $service_type = Catalog::Where("status",1)->get();
        $jobStatus = Job::jobStatus();
        $employees = Employee::All();
        $employees_assigned = JobEmployee::where(["job" => $id])->get();
        $res = $employees_assigned->load(['employee']);

        return view('jobs/show', [
            'activeMenu' => 'Jobs details',
            "jobs" => 0,
            "job" => $detail,
            'payment_methods'=> $payment_methods,
            'service_type'=> $service_type,
            'employees'=> $employees,
            'jobStatus'=> $jobStatus,
            'jobEmployees' => $res
        ]);
    }

    public function add_service_employee(request $request) {
        
        $flag = false;
        $job = $request->job;
        $employee = $request->employee;

        $result = JobEmployee::where(["job" => $job, "emp"=> $employee])->get();

        if (count($result) == 0) {

            JobEmployee::create(["job" => $job, "emp" => $employee]);
            $flag = true;
        }

        return redirect('jobs/'. $job)->with('message', $flag ? 'Records was added Successfully': 'Record already exist!');
    }

    public function remove_service_employee(JobEmployee $request, $id) {
        
        $response = JobEmployee::where(["id" => $id])->first();
        
        $jobId = $response->job;
        
        if ($response) {

            $response->delete();

            return redirect('jobs/'. $jobId)->with('message', 'Records was deleted Successfully');
        } else {
            return redirect('jobs/'. $jobId)->with('message', 'Record already exist!');
        }
    
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
            'activeMenu' => 'Jobs details',
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

        if (isset($data['recurrent'])) {
            $data['recurrent'] = 1;
        }

        
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
