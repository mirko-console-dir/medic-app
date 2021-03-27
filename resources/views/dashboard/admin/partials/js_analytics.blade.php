<script>
    // ADMINNUMBERDOCTORS

    var ctz = document.getElementById('adminNumberDoctors');
    var encode_doctor_x_axes = {!!$encode_doctor_x_axes!!};
    console.log(encode_doctor_x_axes);
    var encode_doctor_date_array = {!!$encode_doctor_date_array!!};
    // console.log(encode_doctor_date_array);

    const obj_doctors = {};

    for (const key of encode_doctor_x_axes) {
        obj_doctors[key]= '';

        // console.log(key);
        for (const value in encode_doctor_date_array ) {
            if(value == key){
                console.log(encode_doctor_date_array);
                obj_doctors[key] = encode_doctor_date_array[key];
            }
        }
    }

    var y_axes_doctor = Object.values(obj_doctors);
    
    var adminNumberDoctors = new Chart(ctz, {
        type: 'bar',
        data: {
            labels: encode_doctor_x_axes,
            datasets: [{
                label: '# of Doctors',
                data: y_axes_doctor,
                backgroundColor: [
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                     'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)', 'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)', 'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)', 'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)', 'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)', 'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)', 'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)', 'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)', 'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                ],
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date',
                    },
                    ticks: {
              
                maxTicksLimit:'15',
                // min:0,
                max:10,
                fontColor: '#ffffff',
                
            },
            gridLines: {
            zeroLineColor: '#84BE46',
            }
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

    // /ADMINNUMBERDOCTORS




    // ADMINSPONSORSHIPS

    var cty = document.getElementById('adminSponsorship');


    var adminSponsorship = new Chart(cty, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Standard',
                data: [],
                backgroundColor: [
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',

                ],
                borderWidth: 1
            }, {
                label: 'Premium',
                data: [],

                backgroundColor: [
                    'rgba(0, 29, 63, 1)',
                    'rgba(0, 29, 63, 1)',
                    'rgba(0, 29, 63, 1)',
                    'rgba(0, 29, 63, 1)',
                    'rgba(0, 29, 63, 1)',
                    'rgba(0, 29, 63, 1)',



                ],
                borderWidth: 1

            }, {
                label: 'Exclusive',
                data: [],
                backgroundColor: [
                    'rgba(133, 190, 70, 1)',
                    'rgba(133, 190, 70, 1)',
                    'rgba(133, 190, 70, 1)',
                    'rgba(133, 190, 70, 1)',
                    'rgba(133, 190, 70, 1)',
                    'rgba(133, 190, 70, 1)',

                ],
                borderWidth: 1

            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                }],
                yAxes: [{
                    ticks: {
                        callback: function(value, index, values) {
                            return '€' + value;
                        },
                        min: 0,
                        max: 100,
                    }
                }]
            }
        }
    });
</script>