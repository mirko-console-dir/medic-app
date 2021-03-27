<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Review;
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
    public function index(User $user, Message $message, Review $review)
    {
        // $users_month = User::orderBy('created_at', 'ASC')->pluck('created_at');  

        $user = Auth::user();
        $users = User::all();
        
        $user_sponsorships = json_encode(User::with('sponsorships')->get());
        
        $user_id = Auth::user()->id;
        // dd($user_id);
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
        
        }

        return view('dashboard.admin.analytics',compact('user','users','user_sponsorships','encode_months_x_axes','encode_date_array','encode_review_date_array', 'encode_review_months_x_axes','vote_1','vote_2','vote_3','vote_4','vote_5'));
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
