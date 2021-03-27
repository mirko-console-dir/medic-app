<template>
  <form class="form col-lg-6 col-sm-12"  autocomplete="off" action="/search">

      <div class="d_flex input_container">
        <input class="no_blur" type="text" name="search" placeholder="Start typing a specialization"
          v-model="search"
          @keyup="specFilter(search)"
          @click="showList()"
        >
        <button type="submit" name="button"
          @click="cookie()"
        >GO</button>
      </div>

      <ul id="spec_list" v-if="search.length === 0" :class="show?'active':''" >
        <li v-for="(spec, index) in specializations" :key="index">
          <a class="no_blur" href="#" @click="writeSpec(spec)">{{spec}}</a>
        </li>
      </ul>

      <ul id="spec_list" v-else :class="show?'active':''" >
        <li v-for="(spec, index) in filterSpec" :key="index">
          <a class="no_blur" href="#" @click="writeSpec(spec)">{{spec}}</a>
        </li>
      </ul>
  </form>
</template>

<script>
    export default {
      props: ["api"],
      data: function () {
        return {
          users: [],
          search: '',
          filterDoctors: [],
          filterSpec: [],
          doctor: [],
          specializations: [],
          show: false,
          list: null,
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
          if(this.search != ""){
            return document.cookie = "search=" + this.search;
          }
          return document.cookie = "search=all"; 
        },

        writeSpec: function(spec){
          return this.search = spec[0].toUpperCase() + spec.substring(1);
        }

      },

      mounted() {
        axios
        .get(this.api) //.get('api/users')
        .then(response => {
              this.users = response.data.data;

              //Creazione Elenco specializzazioni
              this.users.forEach(doctor=>{
                doctor.specializations.forEach(spec=>{
                  if(!this.specializations.includes(spec.name.toLowerCase())){
                    return this.specializations.push(spec.name.toLowerCase());
                  }
                });
              });
        })
        .catch(error => {
            console.log(error);
        });

        /**
        * Funzione che permette di nascondere la visualizzazione della lista
        * delle specializzazioni quando si clicca su elementi senza classe 'no_blur'
        */
        document.addEventListener('click', (event)=>{
          if(!event.target.className.includes('no_blur')){
            return this.show = false;
          }
        });
        this.cookie();
        console.log('Component "Searchhome" mounted');
      },
      destroyed(){
        document.removeEventListener('click');
      },
    }
</script>
