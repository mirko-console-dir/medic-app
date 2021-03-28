<script>
    // ADMINNUMBERDOCTORS

    var ctz = document.getElementById('adminNumberDoctors');
    var encode_doctor_x_axes = {!!$encode_doctor_x_axes!!};
    console.log(encode_doctor_x_axes);
    var encode_doctor_date_array = {!!$encode_doctor_date_array!!};
    console.log(encode_doctor_date_array);

    const obj_doctors = {};

    for (const key of encode_doctor_x_axes) {
        obj_doctors[key] = '';

        // console.log(key);
        for (const value in encode_doctor_date_array) {
            if (value == key) {
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
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
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
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
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

                        maxTicksLimit: '15',
                        // min:0,
                        max: 10,
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
                    },
                    gridLines: {
                        zeroLineColor: '#84BE46',
                    },
                }]
            }
        }
    });

    // /ADMINNUMBERDOCTORS




    // ADMINSPONSORSHIPS

    var ctw = document.getElementById('adminSponsorship');

    var encode_sponsorship_x_axes = {!!$encode_sponsorship_x_axes!!};
    console.log(encode_sponsorship_x_axes);

    
// *******STANDARD
    
    var encode_standard = {!!$encode_standard!!};
    // console.log(encode_standard);
    var tot_standard = 0;
    for (let key in encode_standard) {
        // console.log(element);
        if (Object.hasOwnProperty.call(encode_standard, key)) {

            let element = encode_standard[key];
            // console.log(element);
            for (let i = 0; i < encode_standard[key].length; i++) {

                element = 2.99;
                tot_standard += element;
                // console.log(element);
            }

            encode_standard[key] = tot_standard;

        }

     

    };
    console.log(encode_standard);

    const obj_standard = {};

    for (const key of encode_sponsorship_x_axes) {
        
        obj_standard[key]='';

        for (const value in encode_standard) {
            if(value == key) {
                obj_standard[key] = encode_standard[key];
            }
        }

    }

    var y_axes_standard = Object.values(obj_standard);

// ********** PREMIUM

   var encode_premium = {!!$encode_premium!!};
    // console.log(encode_premium);
    var tot_premium = 0;
    for (let key in encode_premium) {
        // console.log(element);
        if (Object.hasOwnProperty.call(encode_premium, key)) {

            let element = encode_premium[key];
            // console.log(element);
            for (let i = 0; i < encode_premium[key].length; i++) {

                element = 5.99;
                tot_premium += element;
                // console.log(element);
            }

            encode_premium[key] = tot_premium;

        }

     

    }

    console.log(encode_premium);
    
    const obj_premium = {};

    for (const key of encode_sponsorship_x_axes) {
        
        obj_premium[key]='';

        for (const value in encode_premium) {
            if(value == key) {
                obj_premium[key] = encode_premium[key];
            }
        }

    }

    var y_axes_premium = Object.values(obj_premium);
    


// ********** EXCLUSIVE

     var encode_exclusive = {!!$encode_exclusive!!};
    // console.log(encode_exclusive);
    var tot_exclusive = 0;
    for (let key in encode_exclusive) {
        // console.log(element);
        if (Object.hasOwnProperty.call(encode_exclusive, key)) {

            let element = encode_exclusive[key];
            // console.log(element);
            for (let i = 0; i < encode_exclusive[key].length; i++) {

                element = 9.99;
                tot_exclusive += element;
                // console.log(element);
            }

            encode_exclusive[key] = tot_exclusive;

        }

     

    };
    console.log(encode_exclusive);
    const obj_exclusive = {};

    for (const key of encode_sponsorship_x_axes) {
        
        obj_exclusive[key]='';

        for (const value in encode_exclusive) {
            if(value == key) {
                obj_exclusive[key] = encode_exclusive[key];
            }
        }

    }

    var y_axes_exclusive = Object.values(obj_exclusive);
    console.log(y_axes_exclusive);

   
    
// **********ADMIN_SPONSORSHIP_ANALYTIC

    var adminSponsorship = new Chart(ctw, {
        type: 'bar',
        data: {
            labels: encode_sponsorship_x_axes,
            datasets: [{
                label: 'Standard',
                data: y_axes_standard,
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
                data: y_axes_premium,
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
                data: y_axes_exclusive,
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
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        maxTicksLimit: '15',
                        max: 10,
                        fontColor: '#ffffff',
                    },
                     gridLines: {
                        zeroLineColor: '#84BE46',
                    }
                }],
                yAxes: [{
                    ticks: {
                        callback: function(value, index, values) {
                            return '€' + value;
                        },
                        min: 0,
                        max: 100,
                    },
                     gridLines: {
                        zeroLineColor: '#84BE46',
                    }
                }]
            }
        }
    });
</script>