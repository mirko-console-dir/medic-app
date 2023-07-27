<template>
    
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
