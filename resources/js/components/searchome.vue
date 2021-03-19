<template>
<<<<<<< HEAD
  <form class="col-lg-6 col-sm-12 d_flex" action="/search" method="post">
    <input type="text" name="search" placeholder="Search for a specialization here" v-model="initValue" v-on:change="filteredUsers()">
 
    <button type="submit" name="button">GO</button>
=======
  <form class="col-lg-6 col-sm-12" action="/search" method="post">
      <div class="d_flex">
        <input type="text" name="search" placeholder="Search for a specialization" @keyup="specFilter(search)" v-model="search">
        <button type="submit" name="button">GO</button>
      </div>
        <ul>
          <li v-for="spec in filterSpec">{{spec}}</li>
        </ul>

>>>>>>> AM-Frontend
  </form>
</template>

<script>
    import { reactive } from 'vue'
    export default {
      setup() {
        filterSpec = reactive(filterSpec);
      },
      data: function () {
        return {
<<<<<<< HEAD
          initValue : '',
          users: [],
        
=======
          users: [],
          search: '',
          filterDoctors: [],
          filterSpec: [],
          doctor: [],
          specializations: [],
>>>>>>> AM-Frontend
        }
      },
      computed: {
        specList: function(){
          this.users.forEach(doctor=>{
            doctor.specializations.forEach(spec=>{
              if(!this.specializations.includes(spec.name.toLowerCase())){
                return this.specializations.push(spec.name.toLowerCase());
              }
            });
          });
        },
        
      },
      methods: {
        specFilter: function(search){
          this.filterSpec = [];
          this.specializations.forEach(spec =>{
            if(spec.toLowerCase().includes(search.toLowerCase())){
              return this.filterSpec.push(spec);
            } 
          });
        },
      },
      created(){
      },
      mounted() {
<<<<<<< HEAD

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
                  
=======
        console.log('Component "Searchhome" mounted');
        axios
        .get('api/users')
        .then(response => {
            console.log(response.data.data);
            this.users = response.data.data;
        })
        .catch(error => {
            console.log(error);
        })
        this.filterSpec = this.specializations;
>>>>>>> AM-Frontend
      }
      },
    }

    //Vue.set(searchome.filterSpec, searchome.specFilter());
</script>
