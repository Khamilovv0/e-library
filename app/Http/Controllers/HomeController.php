<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\in_messages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        $info = DB::connection('mysql_ais')->table('db_users')
            ->where('db_users.platonus_login', Auth::user()->Login)
            ->leftJoin('db_users_profiles', 'db_users.user_login', '=', 'db_users_profiles.user_login')
            ->leftJoin('db_jobs', 'db_users_profiles.id_job', '=', 'db_jobs.id_job')
            ->leftJoin('db_organigramme', 'db_users_profiles.division_id', '=', 'db_organigramme.division_id')
            ->select(
                'db_users_profiles.email',
                'db_users_profiles.fio_rus',
                'db_users_profiles.avatar_url',
                'db_users_profiles.mobile_phone',
                'db_jobs.name_job_rus',
                'db_organigramme.division_name_rus'
            )
            ->get();


        return view('backend.home', compact('info'));
    }


}
