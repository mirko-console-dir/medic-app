<script>
    // ADMINNUMBERDOCTORS


    var ctx = document.getElementById('adminNumberDoctors');
    // console.log(users);
    var months_array = [];
    var tot_user_per_month = [];
    var users = {!!$users!!};

    // console.log(users);
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

    // console.log(months_array);

    tot_user_per_month.sort();
    months_array.sort();

    // console.log(tot_user_per_month);
    const user_per_month = [];

    for (let i = 0; i < tot_user_per_month.length; i++) {

        // console.log(tot_user_per_month[i])


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

    // console.log(months_name);

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

    // console.log(values_per_month);

    let data = [];
    values_per_month.forEach(element => {

        let g = (Array.from(element));

        // console.log(g);
        let total = 0;
        for (let i = 0; i < g.length; i++) {
            // console.log(g[i]);
            const parsed = parseInt(g[i])
            total += parsed;
        }

        // console.log(total);
        data.push(total);
        // })


    })

    // console.log(data);
    // MAKE ARRAY AS OBJECT
    var months_object = Object.assign({}, months_array);
    // console.log(months_object);

    // NUMERI DI USER NEL SITO -1 PER L'ADMIN
    var users_number = users.length - 1;
    // console.log(users_number);
    var adminNumberDoctors = new Chart(ctx, {
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
                    console.log(value);
                    standard.push(value);
                } else if (value.name == 'premium') {
                    premium.push(value);
                } else if (value.name == 'exclusive') {
                    exclusive.push(value);
                }

            });
        }
    }

    console.log(standard);
    console.log(premium);
    console.log(exclusive);

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

    console.log(standard_march);
    console.log(premium_march);
    console.log(exclusive_march);


    //REDUCER TO BE ABLE TO SUM VALUES WITHIN THE ARRAY
    const reducer = (accumulator, currentValue) => accumulator + currentValue;

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