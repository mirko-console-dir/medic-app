<template>
  <form class="col-lg-6 col-sm-12" action="/search" method="post">
      <div class="d_flex">
        <input type="text" name="search" placeholder="Search for a specialization" @keyup="specFilter(search)" v-model="search">
        <button type="submit" name="button">GO</button>
      </div>
        <ul>
          <li v-for="spec in filterSpec">{{spec}}</li>
        </ul>

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
          users: [],
          search: '',
          filterDoctors: [],
          filterSpec: [],
          doctor: [],
          specializations: [],
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
      }
    }

    //Vue.set(searchome.filterSpec, searchome.specFilter());
</script>
