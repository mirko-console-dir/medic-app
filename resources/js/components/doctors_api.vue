<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="user in users" :key="user.id">
                    <div class="card-header">{{ user.name }} {{ user.lastname }}</div>

                    <div class="card-body">
                        <div v-if="user.prefixes">
                            <p> Phone number: {{ user.prefixes.dial_code }} </p>
                            {{ user.phone_number }}
                        </div>
                        <div v-if="user.specializations">
                            Specializations:
                            <span v-for="specializations in user.specializations" :key="specializations.id"> 
                            {{ specializations.name }} 
                            </span>
                        </div>
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
                // users: "",
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
