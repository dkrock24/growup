<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MailsHelper;
use App\Http\Helpers\PaginationHelper;
use App\Models\Catalog;
use App\Models\User;
use App\Models\Job;
use App\Models\PaymentMethod;
use DateInterval;
use Illuminate\Http\Request;
use Auth;

class ServicesController extends Controller
{
    private $mail;
    public function __construct(MailsHelper $mail)
    {
        $this->middleware('auth');
        $this->mail = $mail;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $customer = User::where("id", Auth::user()->id)->first();
        $jobs = Job::where(["customer" => Auth::user()->id, "status" => 0])->with(['user', 'serviceType'])->orderBy('deadline')->get();
        $JobList = Job::where(["customer" => Auth::user()->id])->with(['user', 'serviceType'])->orderBy('deadline')->get();
        $pending = $JobList->where('status', 0);
        $ongoing = $JobList->where('status', 1);
        $completed = $JobList->where('status', 2);
        $canceled = $JobList->where('status', 3);

        return view('services/home', [
            "customer" => $customer,
            "jobs" => $jobs,
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
        /*$user =  User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'agreed' => $request['agreed'] ? true : false,
            'email' => $request['email'],
            'password' => hash::make($request['password']),
            'role_id' => 2
        ]);

        if ($user) {
            return redirect('/services')->with('message', 'You are in now!');
        } else {
            return redirect('/register')->with('message', 'Something went wrong!');
        }*/
        $services = Catalog::all()->where("status", 1);
        $customer = User::where("id", Auth::user()->id)->first();

        $payment_methods = PaymentMethod::Where("status",1)->get();

        $datetime = new \DateTime(now());
        $datetime->add(new DateInterval("P1D"));
        $deadline = $datetime->format('Y-m-d 08:00:00');

        return view('services/create', [
            'services'=> $services,
            'customer'=> $customer,
            'deadline'=> $deadline,
            'payment_methods'=> $payment_methods
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        !isset($data['status']) ? $data['status'] = 0 : $data['status'] = 0;
        !isset($data['is_paid']) ? $data['is_paid'] = 0 : $data['status'] = 0;
        $data['customer'] = Auth::user()->id;

        $service = Catalog::where(['id'=> $data['service']])->first();

        $data['amount'] = $service->price;
        $data['total'] = $service->price;

        $job = Job::create($data);
        
        $job->with(['user', 'serviceType']);
      
        $this->mail->newJob(Auth::user()->email, $job);

        //Mail::to(Auth::user()->email)->send(new SampleMail($content));
        
        return redirect('services/list')->with('message', 'Record was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        $jobs = Job::where('customer', Auth::user()->id)->with(['user', 'serviceType'])->orderBy('deadline')->get();
        
        $showPerPage = 10;
        $page = 1;

        $paginated = PaginationHelper::paginate($jobs, $showPerPage);
        
        if ($request->page != $page) {
            //dd($paginated);
        }

        
        
        
        //$jobs = Job::With(['user'])->where('customer', Auth::user()->id)->get();

        /*foreach ($jobs as $job) {

            var_dump($job->serviceType);
        }
        dd(1);*/
        return view('services/list', ["jobs" => $paginated]);
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
        return redirect('services/list')->with('message', 'Record was created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        //
    }
}
