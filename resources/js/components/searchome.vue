<template>
  <form class="col-lg-6 col-sm-12" action="/search" method="post" autocomplete="off">
      <div class="d_flex input_container">
        <input type="text" onfocus="appearList()" onfocusout="disappearList()" name="search" placeholder="Search for a specialization" v-model="search" @keyup="specFilter(search)">
        <button type="submit" name="button">GO</button>
      </div>
      <ul id="spec_list">
        <li v-if="filterSpec.length === 0" v-for="spec in specializations" >
          <a href="#" >{{spec}}</a>
        </li>
        <li v-if="filterSpec.length > 0" v-for="spec in filterSpec" >
          <a href="#" >{{spec}}</a>
        </li>
      </ul>
  </form>
</template>

<script>
    export default {
      props: ["componentName", "api"],
      data: function () {
        return {
          users: [],
          search: '',
          filterDoctors: [],
          filterSpec: [],
          doctor: [],
          specializations: [],
          apiRequest: this.api,
        }
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
          this.filterSpec = filter;
          return
        },
      },

      created() {
        self = this;
        axios
        //.get('api/users')
        .get(self.apiRequest)
        .then(response => {
            if(response.data.data != undefined){
              self.users = response.data.data;

              //Creazione Elenco specializzazioni
              self.users.forEach(doctor=>{
                doctor.specializations.forEach(spec=>{
                  if(!self.specializations.includes(spec.name.toLowerCase())){
                    return self.specializations.push(spec.name.toLowerCase());
                  }
                });
              });

              //console.log("self.specializations", self.specializations);
            }

        })
        .catch(error => {
            console.log(error);
        });
      },

      mounted() {
        console.log('Component "Searchhome" mounted');
      },
    }
</script>
