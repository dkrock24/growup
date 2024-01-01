<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        //dd(auth()->user()->name);
        if (auth()->user()->role_id == 2) {
            return redirect('services')->with('message', 'Hello!');
        }
        $jobs = Job::where(["status" => 0])->with(['user', 'serviceType'])->orderBy('deadline')->get();

        $coming10jobs = Job::whereDate("deadline", ">=", Carbon::now()
            ->toDateTimeString())
            ->limit(10)
            ->with(['user', 'serviceType'])
            ->orderBy('deadline')->get();


        $JobList = Job::whereDate("deadline", ">=", Carbon::now()->subDays(7)
            ->toDateTimeString())->with(['user', 'serviceType'])->orderBy('deadline')->get();
        $pending = $JobList->where('status', 0);
        $ongoing = $JobList->where('status', 1);
        $completed = $JobList->where('status', 2);
        $canceled = $JobList->where('status', 3);


        return view('home', [
            'home' => '',
            'jobs' => $coming10jobs,
            "jobList" => $JobList,
            "pending" => $pending,
            "ongoing" => $ongoing,
            "completed" => $completed,
            "canceled" => $canceled,
        ]);
    }
}
