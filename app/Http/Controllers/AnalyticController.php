<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Review;
use App\Sponsorship;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Message $message, Review $review, Sponsorship $sponsorship)
    {
        // $users_month = User::orderBy('created_at', 'ASC')->pluck('created_at');  

        $user = Auth::user();
        $users = User::all();
        
        $user_sponsorships = json_decode(User::has('sponsorships')->with('sponsorships')->get());
        
        // dd($user_sponsorships);
        $user_id = Auth::user()->id;

        // dd($user_sponsorships);
        $sponsorship_date_array = array();

        foreach($user_sponsorships as $user_has_relation){
            
            // dd($user_has_relation->sponsorships);

            foreach($user_has_relation->sponsorships as $sponsorship){
                // dd($sponsorship);
                if($sponsorship->id != 1){

                   $sponsorship_date = Carbon::parse($sponsorship->pivot->created_at);
                   $sponsorship_year_date = $sponsorship_date->year;
                   $sponsorship_month_date = $sponsorship_date->month;

                    if ($sponsorship_month_date >= 10) {
                        $full_date = $sponsorship_year_date . '-' . $sponsorship_month_date;
                        // dd($full_date);
                    } else {
                        $full_date = $sponsorship_year_date . '-' . '0' . $sponsorship_month_date;
                        // dd($full_date);
                    }

                    // $tot_sponsorships = User::has('sponsorships')->with('sponsorships')->whereMonth('created_at', $sponsorship_month_date)->whereYear('created_at', $sponsorship_year_date)->get()->count();
                    // dd($tot_sponsorships);
                    $tot_sponsorships = DB::table('user_sponsorship')->whereMonth('created_at', $sponsorship_month_date)->whereYear('created_at', $sponsorship_year_date)->where('sponsorship_id', '>', 1)->get()->count();

                    // dd($tot_sponsorships);
                    $sponsorship_date_array[$full_date] = $tot_sponsorships;

                    $standard[$full_date] = DB::table('user_sponsorship')->whereMonth('created_at', $sponsorship_month_date)->whereYear('created_at', $sponsorship_year_date)->where('sponsorship_id', '=', 2)->get();

                    $premium[$full_date] = DB::table('user_sponsorship')->whereMonth('created_at', $sponsorship_month_date)->whereYear('created_at', $sponsorship_year_date)->where('sponsorship_id', '=', 3)->get();

                    $exclusive[$full_date] = DB::table('user_sponsorship')->whereMonth('created_at', $sponsorship_month_date)->whereYear('created_at', $sponsorship_year_date)->where('sponsorship_id', '=', 4)->get();
                    
                }
            }

        }
        // dd($standard);
        $encode_standard = json_encode($standard);
        $encode_premium = json_encode($premium);
        $encode_exclusive = json_encode($exclusive);
        // dd($sponsorship_date_array);

        // $standard_sponsorships = DB::table('user_sponsorship')->

        $sponsorship_start_date = array_key_first($sponsorship_date_array);
        $sponsorship_end_date = array_key_last($sponsorship_date_array);
        $sponsorship_x_axes = array();

        if ($sponsorship_start_date != null && $sponsorship_end_date != null) {
            $sponsorship_period = CarbonPeriod::create($sponsorship_start_date, '1 month', $sponsorship_end_date);
            foreach ($sponsorship_period as $date) {
                $months_period = $date->format('Y-m');
                array_push($sponsorship_x_axes, $months_period);
            }
        }

        // dd($sponsorship_x_axes);
        $encode_sponsorship_x_axes = json_encode($sponsorship_x_axes);


// ************ GRAFICO ADMINNUMBERDOCTORS

        $doctors = json_decode(User::with('roles')->orderBy('created_at', 'ASC')->get());

        $doctors_date_array = array();

        if(!empty($doctors)){


        
        foreach($doctors as $doctor){
            if($doctor->roles[0]->pivot->role_id != 1){
                // dd($doctor->created_at);
                $doctor_date = Carbon::parse($doctor->created_at);
                // dd($doctor_date);
                $doctor_year_date = $doctor_date->year;
                $doctor_month_date = $doctor_date->month;
                    // dd($doctor_year_date);
                    if ($doctor_month_date >= 10) {
                        $full_date = $doctor_year_date . '-' . $doctor_month_date;
                        // dd($full_date);
                    } else {
                        $full_date = $doctor_year_date . '-' . '0' . $doctor_month_date;
                        // dd($full_date);
                    }


                    $tot_doctors = User::whereMonth('created_at', $doctor_month_date)->whereYear('created_at', $doctor_year_date)->get()->count();
                    // dd($tot_doctors);



                    $doctors_date_array[$full_date] = $tot_doctors;

            };
        }

                    // dd($doctors_date_array);

                    $doctor_start_date = array_key_first($doctors_date_array);
                    $doctor_end_date = array_key_last($doctors_date_array);

                    
                    $doctor_x_axes = array();

                    if($doctor_start_date != null && $doctor_end_date != null){
                        $doctor_period = CarbonPeriod::create($doctor_start_date, '1 month', $doctor_end_date);
                        foreach ($doctor_period as $date) {
                            $months_period = $date->format('Y-m');
                            array_push($doctor_x_axes, $months_period);
                        }
                    }
                    
                    $encode_doctor_x_axes = json_encode($doctor_x_axes);
                    // dd($encode_doctor_x_axes);
                    $encode_doctor_date_array = json_encode($doctors_date_array);

    }


// ************GRAFICO REVIEWMESSAGGI

        $reviews = Review::orderBy('created_at', 'ASC')->where('user_id', $user_id)->pluck('created_at');


        if(!empty($reviews)){


            $reviews_dates = json_decode($reviews);

            $review_date_array = array();

            if (!empty($reviews_dates)) {
                foreach ($reviews_dates as $value) {
                    $date = Carbon::parse($value);
                    $date_year = $date->year;
                    $date_month_name = $date->localeMonth;
                    $date_month_no = $date->month;
                    if ($date_month_no >= 10) {
                        $full_date = $date_month_no . ' ' . $date_year;
                        // dd($full_date);
                    } else {
                        $full_date = '0' . $date_month_no . ' ' . $date_year;
                    }
                    // dd($full_date);
                    // ex: March
                    // dd($date_month_name);
                    // ex 2021
                    // dd($date_year);

                    $tot_review = Review::whereMonth('created_at', $date_month_no)->whereYear('created_at', $date_year)->where('user_id', $user_id)->get()->count();

                    // dd($tot_message);
                    

                    $review_date_array[$full_date] = $tot_review;
                }
            }

            // dd($review_date_array);


            $c_d_array = array();
            foreach ($review_date_array as $key => $date) {

                $c_month = substr($key, 0, 2);
                $d_year = substr($key, 3);

                $c_d_date = $d_year . '-' . $c_month;

                array_push($c_d_array, $c_d_date);
            }
            // dd($c_d_array);

            $h = array_combine($c_d_array, $review_date_array);
            // dd($h);


            $review_start_date = array_key_first($h);
            $review_end_date = array_key_last($h);

            // dd($review_start_date);
            $review_months_x_axes = array();

            if($review_start_date != null && $review_end_date != null){
            $review_period = CarbonPeriod::create($review_start_date, '1 month', $review_end_date);
            foreach ($review_period as $date) {

                $j = $date->format('Y-m');
                array_push($review_months_x_axes, $j);
            }
            }
            $encode_review_date_array = json_encode($h);
            $encode_review_months_x_axes = json_encode($review_months_x_axes);
        
            // dd($encode_review_date_array);
            // dd($encode_review_months_x_axes);



}

// ************GRAFICO DOCTORTORTAVOTES

        $votes = Review::orderBy('vote')->where('user_id', $user_id)->pluck('vote');
        // dd($votes);

        $v_1 = array();
        $v_2 = array();
        $v_3 = array();
        $v_4 = array();
        $v_5 = array();


        foreach ($votes as $key => $value) {
            if($value == 1){
                array_push($v_1, $value);
            }
            if ($value == 2) {
                array_push($v_2, $value);
            }
            if ($value == 3) {
                array_push($v_3, $value);
            }
            if ($value == 4) {
                array_push($v_4, $value);
            }
            if ($value == 5) {
                array_push($v_5, $value);
            }
        }

        $vote_1 = json_encode(array_count_values($v_1));
        $vote_2 = json_encode(array_count_values($v_2));
        $vote_3 = json_encode(array_count_values($v_3));
        $vote_4 = json_encode(array_count_values($v_4));
        $vote_5 = json_encode(array_count_values($v_5));


// ************GRAFICO DOCTORMESSAGGI


        $messages = Message::orderBy('created_at', 'ASC')->where('user_id', $user_id)->pluck('created_at');

        // dd($messages);
        if(!empty($messages)){

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
                    if ($date_month_no >= 10) {
                        $full_date = $date_month_no . ' ' . $date_year;
                    } else {
                        $full_date = '0' . $date_month_no . ' ' . $date_year;
                    }
                    // dd($full_date);
                    // ex: March
                    // dd($date_month_name);
                    // ex 2021
                    // dd($date_year);

                    $tot_message = Message::whereMonth('created_at', $date_month_no)->whereYear('created_at', $date_year)->where('user_id', $user_id)->get()->count();

                    // dd($tot_message);

                    $date_array[$full_date] = $tot_message;
                    // dd($date_array);

                }
            }

            $a_b_array = array();
            foreach ($date_array as $key => $date) {
                // dd($key);
                $a_month = substr($key, 0, 2);
                // dd($a_month);
                $b_year = substr($key, 3);

                $a_b_date = $b_year . '-' . $a_month;
                // dd($a_b_date);
                array_push($a_b_array, $a_b_date);
            }

            $g = array_combine($a_b_array, $date_array);
            // dd($g);


            $start_date = array_key_first($g);
            $end_date = array_key_last($g);

            $months_x_axes = array();

            if($start_date != null && $end_date != null){
            $period = CarbonPeriod::create($start_date, '1 month', $end_date);
            foreach ($period as $date) {

                $b = $date->format('Y-m');
                array_push($months_x_axes, $b);
            }
        }
            // dd($months_x_axes);
            $encode_date_array = json_encode($g);
            $encode_months_x_axes = json_encode($months_x_axes);
            // dd($encode_months_x_axes);
        }

        return view('dashboard.admin.analytics',compact('user','users','user_sponsorships','encode_months_x_axes','encode_date_array','encode_review_date_array', 'encode_review_months_x_axes','vote_1','vote_2','vote_3','vote_4','vote_5', 'encode_doctor_x_axes','encode_doctor_date_array', 'encode_sponsorship_x_axes','encode_standard','encode_premium','encode_exclusive'));
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
