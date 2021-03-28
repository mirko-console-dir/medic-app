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
        props: [
            'covid'
        ]
        data(){
            return{
                covid: [],
            }
        },
        mounted() {
            const options = {
                method: 'GET',
                url: 'https://covid-19-statistics.p.rapidapi.com/reports/total',
                headers: {
                    'x-rapidapi-key': 'd3fb627121mshecec64432a2390fp1a9e45jsn8911f56064b9',
                    'x-rapidapi-host': 'covid-19-statistics.p.rapidapi.com'
                }
            };

            axios.request(options).then(function (response) {
                console.log(response.data.data);
                this.covid.push(response.data.data);
            }).catch(function (error) {
                console.error(error);
            });
        }
    }
</script>
<style lang="scss" scoped>
    //inserisci qui lo stile per QUESTO component 
</style>