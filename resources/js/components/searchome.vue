<template>
  <form class="col-lg-6 col-sm-12" action="/search" method="post" autocomplete="off">
      <div class="d_flex">
        <input type="text" name="search" placeholder="Search for a specialization" v-model="search" @keyup="specFilter(search)">
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
      data: function () {
        return {
          users: [],
          search: '',
          filterDoctors: [],
          filterSpec: {},
          doctor: [],
          specializations: [],
          //specFilter: [],

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
        specFilter: function(){
          let filter = [];
          let IndexOfItem = 0;
          let specializations = this.specializations;
          if(this.search.length > 0){
            this.specializations.forEach(spec =>{
              console.log("ciao");
              if(spec.toLowerCase().includes(this.search.toLowerCase())){
                IndexOfItem++;
                filter.push(spec);
                return filter;
              };
            });
          }
          
          console.log(filter, IndexOfItem);
          Vue.set(this.filterSpec, IndexOfItem, filter);
          return 
        },

      },
      created() {
      },
      mounted() {
        axios
        .get('api/users')
        .then(response => {
            console.log(response.data.data);
            this.users = response.data.data;
        })
        .catch(error => {
            console.log(error);
        })
        console.log("specializations", this.specializations);
        console.log('Component "Searchhome" mounted');
      },
    }
</script>
