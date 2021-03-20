@extends('layouts.app')

@section('script')

<div class="container d_flex" id="dashboard">

    @include('dashboard.partials.sidebar')

    <div class="d_flex_column detail" id="account">
        <div class="my_profile d_flex_column">
            <div class="detail d_flex_column">
                <h2>Website Analytics</h2>




                <canvas id="myChart"></canvas>

                <script>
                    var ctx = document.getElementById('myChart');
                    // console.log(users);
                    var months_array = [];
                    var tot_user_per_month = [];
                    var users = {!!$users!!};

                    
                    users.forEach(
                        element => {
                            // console.log(element.created_at);
                            var user_created_at = element.created_at;
                            var date_user = user_created_at.split("");
                            // console.log(date_user);
                            var user_month = date_user.slice(5, 7);
                            // console.log(user_month);
                            // Qui ho preso il mese "03" per ogni singolo utente registrato 
                            var user_month_join = user_month.join('');
                            // console.log(user_month_join);

                            tot_user_per_month.push(user_month_join);

                            if (months_array.indexOf(user_month_join) == -1) {
                                months_array.push(user_month_join);
                            }
                        }
                    );

                    console.log(months_array);

                    tot_user_per_month.sort();
                    months_array.sort();

                    console.log(tot_user_per_month);
                    const user_per_month = [];

                    for (let i = 0; i < tot_user_per_month.length; i++) {

                        console.log(tot_user_per_month[i])


                    }

                    // console.log(user_per_month);
                    const months_name = [];
                    // WITH METHOD MAP DOESNT WORK so we use the map to create the value we want and push them into months_name array!!!
                    const months_array_map = months_array.map(element => {

                        if (element == 01) {
                            element = 'January'
                            months_name.push(element);
                        } else if (element == 02) {
                            element = 'February'
                            months_name.push(element);
                        } else if (element == 03) {
                            element = 'March'
                            months_name.push(element);
                        } else if (element == 04) {
                            element = 'April'
                            months_name.push(element);
                        } else if (element == 05) {
                            element = 'May'
                            months_name.push(element);
                        } else if (element == 06) {
                            element = 'June'
                            months_name.push(element);
                        } else if (element == 07) {
                            element = 'July'
                            months_name.push(element);
                        } else if (element == 08) {
                            element = 'August'
                            months_name.push(element);
                        } else if (element == 09) {
                            element = 'September'
                            months_name.push(element);
                        } else if (element == 10) {
                            element = 'October'
                            months_name.push(element);
                        } else if (element == 11) {
                            element = 'November'
                            months_name.push(element);
                        } else if (element == 12) {
                            element = 'December'
                            months_name.push(element);
                        }


                    });

                    console.log(months_name);

                    // WE MAKE MONTHS_NAME AS OBJECT with key the name of the month
                    const obj_months = {};
                    for (const key of months_name) {
                        obj_months[key] = '';
                    }

                  

                    for (let i = 0; i < tot_user_per_month.length; i++) {

                        if (tot_user_per_month[i] == '01') {
                            tot_user_per_month[i] = 1;
                            obj_months['January'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '02') {
                            tot_user_per_month[i] = 1;
                            obj_months['February'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '03') {
                            tot_user_per_month[i] = 1;
                            obj_months['March'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '04') {
                            tot_user_per_month[i] = 1;
                            obj_months['April'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '05') {
                            tot_user_per_month[i] = 1;
                            obj_months['May'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '06') {
                            tot_user_per_month[i] = 1;
                            obj_months['June'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '07') {
                            tot_user_per_month[i] = 1;
                            obj_months['July'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '08') {
                            tot_user_per_month[i] = 1;
                            obj_months['August'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '09') {
                            tot_user_per_month[i] = 1;
                            obj_months['September'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '10') {
                            tot_user_per_month[i] = 1;
                            obj_months['October'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '11') {
                            tot_user_per_month[i] = 1;
                            obj_months['November'] += tot_user_per_month[i];
                        } else if (tot_user_per_month[i] == '12') {
                            tot_user_per_month[i] = 1;
                            obj_months['December'] += tot_user_per_month[i];
                        }

                    }
                    // console.log(obj_months);

                    let values_per_month = [];

                    for (const value in obj_months) {
                        if (Object.hasOwnProperty.call(obj_months, value)) {
                            const element = obj_months[value];
                            values_per_month.push(element);

                        }
                    }

                    console.log(values_per_month);

                    let data = [];
                    values_per_month.forEach(element => {

                        let g = (Array.from(element));

                        console.log(g);
                        let total = 0;
                        for (let i = 0; i < g.length; i++) {
                            console.log(g[i]);
                            const parsed = parseInt(g[i])
                            total += parsed;
                        }

                        console.log(total);
                        data.push(total);
                        // })


                    })

                    console.log(data);
                    // MAKE ARRAY AS OBJECT
                    var months_object = Object.assign({}, months_array);
                    // console.log(months_object);

                    // NUMERI DI USER NEL SITO -1 PER L'ADMIN
                    var users_number = users.length - 1;
                    // console.log(users_number);
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: months_name,
                            datasets: [{
                                label: '# of Doctors',
                                data: data,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'date',
                                    },
                                    // gridLines: {
                                    //     display: true,
                                    // },
                                }],
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                        max: 10,
                                    }
                                }]
                            }
                        }
                    });
                </script>




            </div>

        </div>

    </div>



</div>

</div>

@endsection