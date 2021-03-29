<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                        <h1>{{covid}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                covid: {},
                now: new Date().toISOString().slice(0,11),
                sevenDaysAgo: new Date(Date.now() - 7 * 24 * 60 * 60 * 1000).toISOString().slice(0,11)
            }
        },
        computed: {

            // date: function (){

            //     var now = new Date();
            //     console.log(now.toISOString());
            //     return now.toISOString();
                
            // } 
        },

        mounted() {
            
            https://api.covid19api.com/world?from=2021-03-01T00:00:00Z&to=2021-03-28T00:00:00Z

            // const options = {
            //     method: 'GET',
            //     url: 'https://covid-19-statistics.p.rapidapi.com/reports/total',
            //     headers: {
            //         'x-rapidapi-key': 'd3fb627121mshecec64432a2390fp1a9e45jsn8911f56064b9',
            //         'x-rapidapi-host': 'covid-19-statistics.p.rapidapi.com'
            //     }
            // };

            // axios.request(options).then(response => {
            //     console.log(response.data.data);
            //     this.covid = (response.data.data);
            // }).catch(function (error) {
            //     console.error(error);
            // });

            // var options = {
            //     method: 'GET',
            //     url: `https://api.covid19api.com/world?from=2021-03-01T00:00:00Z&to=${this.date}Z`,
            // };
            
            axios.get(`https://api.covid19api.com/world?from=${this.sevenDaysAgo}00:00:00Z&to=${this.now}00:00:00Z`)
            .then(response => {
                console.log(this.now);
                console.log(this.sevenDaysAgo);
                console.log(response.data);
                //this.covid = (response.data.data);
                
            }).catch(function (error) {
                console.error(error);
            });
            
        }
    }
</script>
<style lang="scss" scoped>
    //inserisci qui lo stile per QUESTO component 
</style>