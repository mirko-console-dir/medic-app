<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

class AnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Message $message)
    {
        // $users_month = User::orderBy('created_at', 'ASC')->pluck('created_at');  

        $user = Auth::user();
        $users = User::all();
        
        $user_sponsorships = json_encode(User::with('sponsorships')->get());
        
        $user_id = Auth::user()->id;
        // dd($user_id);
        
        $messages = Message::orderBy('created_at', 'ASC')->where('user_id', $user_id)->pluck('created_at');

        // dd($messages);



        $messages_dates = json_decode($messages);
        // dd($messages_dates);
        $date_array = array();

        if (!empty($messages_dates)) {
            // dd($messages_dates);
            foreach ($messages_dates as $datez) {
                // dd($datez);

                $date = Carbon::parse($datez);
                $date_year = $date->year;
                $date_month_name = $date->localeMonth;
                $date_month_no = $date->month;
                $full_date = '0' . $date_month_no . ' ' . $date_year;
                // dd($full_date);
                // ex: March
                // dd($date_month_name);
                // ex 2021
                // dd($date_year);

                $tot_message = Message::whereMonth('created_at', $date_month_no)->whereYear('created_at', $date_year)->where('user_id' , $user_id)->get()->count();

                // dd($tot_message);

                $date_array[$full_date] = $tot_message;
                // dd($date_array);
                
            }
        }

        $a_b_array = array();
        foreach ($date_array as $key => $date) {
            // dd($key);
            $a_month = substr($key,0,2);
            // dd($a_month);
            $b_year = substr($key,3);
           
            $a_b_date = $b_year . '-' . $a_month;
            // dd($a_b_date);
            array_push($a_b_array,$a_b_date);

        }

        $g = array_combine($a_b_array, $date_array);
        // dd($g);
// ASSE X DEL GRAFICO DI MESSAGGI DOTTORI

        $start_date = array_key_first($g);
        $end_date = array_key_last($g);

        $months_x_axes = array();
        $period = CarbonPeriod::create($start_date, '1 month', $end_date);
        foreach ($period as $date) {

            $b = $date->format('Y-m');
            array_push($months_x_axes, $b);
        }

        // dd($months_x_axes);
        $encode_date_array = json_encode($g);
        $encode_months_x_axes = json_encode($months_x_axes);

    // 
        return view('dashboard.admin.analytics',compact('user','users','user_sponsorships','encode_months_x_axes','encode_date_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
