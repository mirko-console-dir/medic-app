<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="(user,index) in users" :key="user.id">
                    <div class="card-header">{{ user.name }} {{ user.lastname }}</div>

                    <div class="card-body">
                        <div  v-if="user.prefix">
                            <p> Phone number: {{ user.prefix.dial_code }} </p>
                        </div>
                        {{ user.phone_number }}
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
                users: { type: Object, default: () => ({}) }
            }
        },
        mounted() {
            console.log('Component mounted.');
            axios.get('api/users').then(response => {
                console.log(response.data.data);
                this.users = response.data.data;
            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>
<style lang="scss" scoped>
    //inserisci qui lo stile per QUESTO component 
</style>
