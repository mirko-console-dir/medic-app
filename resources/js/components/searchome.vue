<template>
  <form class="col-lg-6 col-sm-12 d_flex" action="/search" method="post">
    <input type="text" name="search" placeholder="Search for a specialization here" v-model="initValue" v-on:change="filteredUsers()">
 
    <button type="submit" name="button">GO</button>
  </form>
</template>

<script>
    export default{
      
      data: function () {
        return {
          initValue : '',
          users: [],
        
        }
      },

      mounted() {

        axios.get('api/users').then(response => {
                console.log(response.data.data);
                this.users = response.data.data;
            }).catch(error => {
                console.log(error);
            })

      },
      methods: {
        
            filteredUsers: function() {
               return this.filteredUsers = this.users.filter(user => {
                
        return user.specialization.name.toLowerCase().includes(this.initValue.toLowerCase())
      })
                  
      }
      },
    }
</script>
