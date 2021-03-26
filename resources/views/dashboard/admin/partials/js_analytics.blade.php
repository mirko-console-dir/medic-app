<script>
    // ADMINNUMBERDOCTORS


    var ctx = document.getElementById('adminNumberDoctors');
    // console.log(users);
    var tot_user_per_month = [];
    var users = {!!$users!!};

    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var user_months_obj = new Object({
        January: [],
        February: [],
        March: [],
        April: [],
        May: [],
        June: [],
        July: [],
        August: [],
        September: [],
        October: [],
        November: [],
        December: [],
    });


    users.forEach(element => {

        if (element.id != 1) {

            // console.log(element.created_at);
            var slice = (element.created_at).slice(5, 7);
            if (slice == 01) {
                user_months_obj.January.push(slice);
            }
            if (slice == 02) {
                user_months_obj.February.push(slice);
            }
            if (slice == 03) {
                user_months_obj.March.push(slice);
            }
            if (slice == 04) {
                user_months_obj.April.push(slice);
            }
            if (slice == 05) {
                user_months_obj.May.push(slice);
            }
            if (slice == 06) {
                user_months_obj.June.push(slice);
            }
            if (slice == 07) {
                user_months_obj.July.push(slice);
            }
            if (slice == 08) {
                user_months_obj.August.push(slice);
            }
            if (slice == 09) {
                user_months_obj.September.push(slice);
            }
            if (slice == 10) {
                user_months_obj.October.push(slice);
            }
            if (slice == 11) {
                user_months_obj.November.push(slice);
            }
            if(slice == 12){
                user_months_obj.December.push(slice);
            }


        }

    })

    console.log(user_months_obj);

    var january = [];
    var february = [];
    var march = [];
    var april = [];
    var may = [];
    var june = [];
    var july = [];
    var august = [];
    var september = [];
    var october = [];
    var november = [];
    var december = [];




    for (const key in user_months_obj) {
        if (Object.hasOwnProperty.call(user_months_obj, key)) {
            const element = user_months_obj[key];
            element.forEach(value => {
                if(value == 01){
                    value = 1;
                    january.push(parseInt(value));
                }
                 if(value == 02){
                    value = 1;
                    february.push(parseInt(value));
                } if(value == 03){
                    value = 1;
                    march.push(parseInt(value));
                } if(value == 04){
                    value = 1;
                    april.push(parseInt(value));
                } if(value == 05){
                    value = 1;
                    may.push(parseInt(value));
                } if(value == 06){
                    value = 1;
                    june.push(parseInt(value));
                } if(value == 07){
                    value = 1;
                    july.push(parseInt(value));
                } if(value == 08){
                    value = 1;
                    august.push(parseInt(value));
                }
                 if(value == 09){
                    value = 1;
                    september.push(parseInt(value));
                } if(value == 10){
                    value = 1;
                    october.push(parseInt(value));
                } if(value == 11){
                    value = 1;
                    november.push(parseInt(value));
                } if(value == 12){
                    value = 1;
                    december.push(parseInt(value));
                }
            });
            
        }
    }



    console.log(march);
    const reducer = (accumulator, currentValue) => accumulator + currentValue;
    var reduce_january = january.reduce(reducer, 0);
    var reduce_february = february.reduce(reducer, 0);
    var reduce_march = march.reduce(reducer, 0);
    var reduce_april = april.reduce(reducer, 0);
    var reduce_may = may.reduce(reducer, 0);
    var reduce_june = june.reduce(reducer, 0);
    var reduce_july = july.reduce(reducer, 0);
    var reduce_august = august.reduce(reducer, 0);
    var reduce_september = january.reduce(reducer, 0);
    var reduce_october = october.reduce(reducer, 0);
    var reduce_november = november.reduce(reducer, 0);
    var reduce_december = december.reduce(reducer, 0);

    // console.log(users_number);
    var adminNumberDoctors = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: '# of Doctors',
                data: [reduce_january,reduce_february,reduce_march,reduce_april,reduce_may,reduce_june,reduce_july,reduce_august,reduce_september,reduce_october,reduce_november,reduce_december,],
                backgroundColor: [
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
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
                        max: 30,
                    }
                }]
            }
        }
    });

    // /ADMINNUMBERDOCTORS




    // ADMINSPONSORSHIPS

    var cty = document.getElementById('adminSponsorship');

    var user_sponsorships = {!!$user_sponsorships!!};
    // console.log(user_sponsorships);

    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var months_obj = new Object({
        January: [],
        February: [],
        March: [],
        April: [],
        May: [],
        June: [],
        July: [],
        August: [],
        September: [],
        October: [],
        November: [],
        December: [],
    });
    // Array sponsorizzazioni
    // var sponsorships = [];
    user_sponsorships.forEach(element => {
        if (element.sponsorships[0] != null) {

            // console.log(element.sponsorships);
            (element.sponsorships).forEach(value => {
                // console.log(value);
                if (value.name == 'standard') {
                    // standard.push(value);
                    var created_at = value.pivot.created_at.slice(5, 7);
                    // console.log(created_at);
                    if (created_at == 01) {
                        months_obj.January.push(value);
                    }
                    if (created_at == 02) {
                        months_obj.February.push(value);
                    }
                    if (created_at == 03) {
                        months_obj.March.push(value);
                    }
                    if (created_at == 04) {
                        months_obj.April.push(value);
                    }
                    if (created_at == 05) {
                        months_obj.May.push(value);
                    }
                    if (created_at == 06) {
                        months_obj.June.push(value);
                    }
                    if (created_at == 07) {
                        months_obj.July.push(value);
                    }
                    if (created_at == 08) {
                        months_obj.August.push(value);
                    }
                    if (created_at == 09) {
                        months_obj.September.push(value);
                    }
                    if (created_at == 10) {
                        months_obj.October.push(value);
                    }
                    if (created_at == 11) {
                        months_obj.November.push(value);
                    }
                    if (created_at == 12) {
                        months_obj.December.push(value);
                    }
                } else if (value.name == 'premium') {
                    // premium.push(value)
                    var created_at = value.pivot.created_at.slice(5, 7);
                    // console.log(created_at);
                    if (created_at == 01) {
                        months_obj.January.push(value);
                    }
                    if (created_at == 02) {
                        months_obj.February.push(value);
                    }
                    if (created_at == 03) {
                        months_obj.March.push(value);
                    }
                    if (created_at == 04) {
                        months_obj.April.push(value);
                    }
                    if (created_at == 05) {
                        months_obj.May.push(value);
                    }
                    if (created_at == 06) {
                        months_obj.June.push(value);
                    }
                    if (created_at == 07) {
                        months_obj.July.push(value);
                    }
                    if (created_at == 08) {
                        months_obj.August.push(value);
                    }
                    if (created_at == 09) {
                        months_obj.September.push(value);
                    }
                    if (created_at == 10) {
                        months_obj.October.push(value);
                    }
                    if (created_at == 11) {
                        months_obj.November.push(value);
                    }
                    if (created_at == 12) {
                        months_obj.December.push(value);
                    }
                } else if (value.name == 'exclusive') {
                    // exclusive.push(value);
                    // console.log(value.pivot.created_at);
                    var created_at = value.pivot.created_at.slice(5, 7);
                    // console.log(created_at);
                    if (created_at == 01) {
                        months_obj.January.push(value);
                    }
                    if (created_at == 02) {
                        months_obj.February.push(value);
                    }
                    if (created_at == 03) {
                        months_obj.March.push(value);
                    }
                    if (created_at == 04) {
                        months_obj.April.push(value);
                    }
                    if (created_at == 05) {
                        months_obj.May.push(value);
                    }
                    if (created_at == 06) {
                        months_obj.June.push(value);
                    }
                    if (created_at == 07) {
                        months_obj.July.push(value);
                    }
                    if (created_at == 08) {
                        months_obj.August.push(value);
                    }
                    if (created_at == 09) {
                        months_obj.September.push(value);
                    }
                    if (created_at == 10) {
                        months_obj.October.push(value);
                    }
                    if (created_at == 11) {
                        months_obj.November.push(value);
                    }
                    if (created_at == 12) {
                        months_obj.December.push(value);
                    }

                }
            })

        }
    });

    // console.log(months_obj);
    // console.log(standard);
    // console.log(premium);
    // console.log(exclusive);
    var standard = [];
    var premium = [];
    var exclusive = [];

    for (const month in months_obj) {
        if (Object.hasOwnProperty.call(months_obj, month)) {
            const element = months_obj[month];
            // console.log(element);
            element.forEach(value => {
                if (value.name == 'standard') {
                    // console.log(value.price);
                    // console.log(value);
                    standard.push(value);
                } else if (value.name == 'premium') {
                    premium.push(value);
                } else if (value.name == 'exclusive') {
                    exclusive.push(value);
                }

            });
        }
    }

    // console.log(standard);
    // console.log(premium);
    // console.log(exclusive);

    standard_january = [];
    standard_february = [];
    standard_march = [];
    standard_april = [];
    standard_may = [];
    standard_june = [];
    standard_july = [];
    standard_august = [];
    standard_september = [];
    standard_october = [];
    standard_november = [];
    standard_december = [];

    premium_january = [];
    premium_february = [];
    premium_march = [];
    premium_april = [];
    premium_may = [];
    premium_june = [];
    premium_july = [];
    premium_august = [];
    premium_september = [];
    premium_october = [];
    premium_november = [];
    premium_december = [];

    exclusive_january = [];
    exclusive_february = [];
    exclusive_march = [];
    exclusive_april = [];
    exclusive_may = [];
    exclusive_june = [];
    exclusive_july = [];
    exclusive_august = [];
    exclusive_september = [];
    exclusive_october = [];
    exclusive_november = [];
    exclusive_december = [];


    standard.forEach(element => {
        // console.log(element.pivot.created_at);
        if (element.pivot.created_at.slice(5, 7) == 01) {
            standard_january.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 02) {
            standard_february.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 03) {
            standard_march.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 04) {
            standard_april.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 05) {
            standard_may.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 06) {
            standard_june.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 07) {
            standard_july.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 08) {
            standard_august.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 09) {
            standard_september.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 10) {
            standard_october.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 11) {
            standard_november.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 12) {
            standard_december.push(element.price);
        }
    });

    premium.forEach(element => {
        // console.log(element.pivot.created_at);
        if (element.pivot.created_at.slice(5, 7) == 01) {
            premium_january.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 02) {
            premium_february.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 03) {
            premium_march.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 04) {
            premium_april.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 05) {
            premium_may.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 06) {
            premium_june.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 07) {
            premium_july.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 08) {
            premium_august.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 09) {
            premium_september.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 10) {
            premium_october.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 11) {
            premium_november.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 12) {
            premium_december.push(element.price);
        }
    });

    exclusive.forEach(element => {
        // console.log(element.pivot.created_at);
        if (element.pivot.created_at.slice(5, 7) == 01) {
            exclusive_january.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 02) {
            exclusive_february.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 03) {
            exclusive_march.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 04) {
            exclusive_april.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 05) {
            exclusive_may.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 06) {
            exclusive_june.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 07) {
            exclusive_july.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 08) {
            exclusive_august.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 09) {
            exclusive_september.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 10) {
            exclusive_october.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 11) {
            exclusive_november.push(element.price);
        }
        if (element.pivot.created_at.slice(5, 7) == 12) {
            exclusive_december.push(element.price);
        }
    });

    // console.log(standard_march);
    // console.log(premium_march);
    // console.log(exclusive_march);


    //REDUCER TO BE ABLE TO SUM VALUES WITHIN THE ARRAY

    var reduce_standard_january = standard_january.reduce(reducer, 0);
    var reduce_standard_february = standard_february.reduce(reducer, 0);
    var reduce_standard_march = standard_march.reduce(reducer, 0);
    var reduce_standard_april = standard_april.reduce(reducer, 0);
    var reduce_standard_may = standard_may.reduce(reducer, 0);
    var reduce_standard_june = standard_june.reduce(reducer, 0);
    var reduce_standard_july = standard_july.reduce(reducer, 0);
    var reduce_standard_august = standard_august.reduce(reducer, 0);
    var reduce_standard_september = standard_september.reduce(reducer, 0);
    var reduce_standard_october = standard_october.reduce(reducer, 0);
    var reduce_standard_november = standard_november.reduce(reducer, 0);
    var reduce_standard_december = standard_december.reduce(reducer, 0);

    var reduce_premium_january = premium_january.reduce(reducer, 0);
    var reduce_premium_february = premium_february.reduce(reducer, 0);
    var reduce_premium_march = premium_march.reduce(reducer, 0);
    var reduce_premium_april = premium_april.reduce(reducer, 0);
    var reduce_premium_may = premium_may.reduce(reducer, 0);
    var reduce_premium_june = premium_june.reduce(reducer, 0);
    var reduce_premium_july = premium_july.reduce(reducer, 0);
    var reduce_premium_august = premium_august.reduce(reducer, 0);
    var reduce_premium_september = premium_september.reduce(reducer, 0);
    var reduce_premium_october = premium_october.reduce(reducer, 0);
    var reduce_premium_november = premium_november.reduce(reducer, 0);
    var reduce_premium_december = premium_december.reduce(reducer, 0);

    var reduce_exclusive_january = exclusive_january.reduce(reducer, 0);
    var reduce_exclusive_february = exclusive_february.reduce(reducer, 0);
    var reduce_exclusive_march = exclusive_march.reduce(reducer, 0);
    var reduce_exclusive_april = exclusive_april.reduce(reducer, 0);
    var reduce_exclusive_may = exclusive_may.reduce(reducer, 0);
    var reduce_exclusive_june = exclusive_june.reduce(reducer, 0);
    var reduce_exclusive_july = exclusive_july.reduce(reducer, 0);
    var reduce_exclusive_august = exclusive_august.reduce(reducer, 0);
    var reduce_exclusive_september = exclusive_september.reduce(reducer, 0);
    var reduce_exclusive_october = exclusive_october.reduce(reducer, 0);
    var reduce_exclusive_november = exclusive_november.reduce(reducer, 0);
    var reduce_exclusive_december = exclusive_december.reduce(reducer, 0);



    var adminSponsorship = new Chart(cty, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Standard',
                data: [reduce_standard_january, reduce_standard_february, reduce_standard_march, reduce_standard_april, reduce_standard_may, reduce_standard_june, reduce_standard_july, reduce_standard_august, reduce_standard_september, reduce_standard_october, reduce_standard_november, reduce_standard_december, ],
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
                data: [reduce_premium_january, reduce_premium_february, reduce_premium_march, reduce_premium_april, reduce_premium_may, reduce_premium_june, reduce_premium_july, reduce_premium_august, reduce_premium_september, reduce_premium_october, reduce_premium_november, reduce_premium_december, ],

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
                data: [reduce_exclusive_january, reduce_exclusive_february, reduce_exclusive_march, reduce_exclusive_april, reduce_exclusive_may, reduce_exclusive_june, reduce_exclusive_july, reduce_exclusive_august, reduce_exclusive_september, reduce_exclusive_october, reduce_exclusive_november, reduce_exclusive_december, ],
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
                    }
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