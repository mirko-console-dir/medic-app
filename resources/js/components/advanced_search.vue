<template>
  <form  class="col-lg-6 col-md-12"  autocomplete="off">

      <div class=" input_container no_blur">
        <input class="form-control text-capitalize no_blur" type="text" name="" placeholder="Search for Specializations"
          v-model="search"
          @keyup="specFilter(search)"
          @click="showList()"
        >
      </div>

      <ul id="spec_list" v-if="search.length === 0" :class="show?'active':''" >
        <li v-for="spec in specializations" >
          <a class="no_blur" href="#" @click="writeSpec(spec)">{{spec}}</a>
        </li>
      </ul>

      <ul id="spec_list" v-else :class="show?'active':''" >
        <li v-for="spec in filterSpec">
          <a class="no_blur" href="#" @click="writeSpec(spec)">{{spec}}</a>
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
          filterDoctors: [],
          filterSpec: [],
          doctor: [],
          specializations: [],
          apiRequest: this.api,
          show: false,
          list: null,
          search: '',
        }
      },
      methods: {
        specFilter: function(){
          let filter = [];
          let specializations = this.specializations;
          if(this.search.length > 0){
            this.specializations.forEach(spec =>{
              if(spec.toLowerCase().includes(this.search.toLowerCase())){
                filter.push(spec);
              }
            });
            if(filter.length === 0){
              filter = ["No results found"]
            }
          }
          return this.filterSpec = filter;
        },

        showList: function(){
          if(!this.show){
            return this.show = true;
          }
        },
        cookie: function() {
          return document.cookie = "search="+this.search;
        },
        writeSpec: function(spec){
          return this.search = spec;
        }

      },

      mounted() {
        self = this;
        axios
        .get(self.apiRequest) //.get('api/users')
        .then(response => {
              self.users = response.data.data;

              //Creazione Elenco specializzazioni
              self.users.forEach(doctor=>{
                doctor.specializations.forEach(spec=>{
                  if(!self.specializations.includes(spec.name.toLowerCase())){
                    return self.specializations.push(spec.name.toLowerCase());
                  }
                });
              });
        })
        .catch(error => {
            console.log(error);
        });

        if(document.cookie.includes("search")){
          this.search = document.cookie.split('; ')
          .find(row => row.startsWith('search='))
          .split('=')[1];
          document.cookie = "search=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }

        /**
        * Funzione che permette di nascondere la visualizzazione della lista
        * delle specializzazioni quando si clicca su elementi senza classe 'no_blur'
        */
        document.addEventListener('click', (event)=>{
          if(event.target.className !='no_blur'){
            return this.show = false;
          }
        });

        console.log('Component "Searchhome" mounted');
      },
      destroyed(){
        document.removeEventListener('click');
      },
    }
</script>
