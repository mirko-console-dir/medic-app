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
                    var users = {!!$users!!};

                    // console.log(months_array);
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

                            if (months_array.indexOf(user_month_join) == -1) {
                                months_array.push(user_month_join);

                            }
                        }
                    );

                    // console.log(months_array);

                    months_array.sort();

                    // console.log(months_array);
                    const months_name = [];
                    // WITH METHOD MAP DOESNT WORK
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
                                data: [12, 19, 3, 5, 2, 3],
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
                                        max: 100,
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