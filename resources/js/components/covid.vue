<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="position-relative">
                     <canvas id="covid"></canvas>
               </div>
            </div>
        </div>
    </div>
</template>

<script>
import Chart from "chart.js";
    export default {
        data(){
            return{
                covid: [],
                covid_dates: [],
                covid_confirmed: [],
                covid_recovered: [],
                covid_deaths: [],
                now: new Date().toISOString().slice(0,11),
                sevenDaysAgo: new Date(Date.now() - 7 * 24 * 60 * 60 * 1000).toISOString().slice(0,11)
            }
        },
        mounted() {

            axios.get(`https://api.covid19api.com/world?from=${this.sevenDaysAgo}00:00:00Z&to=${this.now}00:00:00Z`)
            .then(response => {
                console.log(this.now);
                console.log(this.sevenDaysAgo);
                // console.log(response.data);
                this.covid = (response.data);
                // console.log(this.covid);



           var covid_graph = document.getElementById('covid');
           var covid_array = JSON.parse(JSON.stringify(this.covid))
           console.log(covid_array);
        //    console.log(this.covid);
            covid_array.forEach(element=> {
              var date_day = element.Date.slice(0,10);
             this.covid_dates.push(date_day);
             console.log(element.TotalConfirmed);
             var tot_confirmed = element.TotalConfirmed;

             this.covid_confirmed.push(tot_confirmed);
             var tot_recovered = element.TotalRecovered;
             this.covid_recovered.push(tot_recovered);
             var tot_deaths = element.TotalDeaths;
             this.covid_deaths.push(tot_deaths);

            })

            this.covid_dates.sort();



           var covid = new Chart(covid_graph, {
               type:'line',
              data: {
            labels: this.covid_dates,
            datasets: [{
                label: 'Confirmed',
                data: this.covid_confirmed,
                borderColor: [
                    'rgba(46, 168, 233, 1)',

                ],
                backgroundColor: [
                    'rgba(255, 255, 255, 0)',
                ],
                borderWidth: 3
            }, {
                label: 'Recovered',
                data: this.covid_recovered,
                backgroundColor: [
                    'rgba(255, 255, 255, 0)',

                ],
                borderColor: [
                   'rgba(0, 29, 63, 1)',


                ],
                borderWidth: 3

            }, {
                label: 'Deaths',
                data: this.covid_deaths,
                backgroundColor: [
                    'rgba(255, 255, 255, 0)',
                ],
                borderColor: [
                'rgba(133, 190, 70, 1)',


                ],
                borderWidth: 3

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
                        // fontColor: '#ffffff',

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
                        max: 200000000,
                    },
                    gridLines: {
                        zeroLineColor: '#84BE46',
                    },
                }]
            }
        }

           })










            }).catch(function (error) {
                console.error(error);
            });









        }
    }
</script>

<style lang="scss" scoped>
    #covid{
        width: 600px !important;
        height: 332px !important;
    }
</style>
