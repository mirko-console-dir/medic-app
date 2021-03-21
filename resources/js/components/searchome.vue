<template>
  <form class="col-lg-6 col-sm-12" action="/search" method="post" autocomplete="off">
      
      <div class="d_flex input_container">
        <input class="no_blur" type="text" name="search" placeholder="Start typing a specialization" 
          v-model="search" 
          @keyup="specFilter(search)" 
          @click="showList()" 
        >
        <button type="submit" name="button">GO</button>
      </div>

      <ul id="spec_list" v-if="search.length === 0" :class="show?'active':''" >
        <li v-for="spec in specializations" >
          <a class="no_blur" href="#">{{spec}}</a>
        </li>
      </ul>

      <ul id="spec_list" v-else :class="show?'active':''" >
        <li v-for="spec in filterSpec" >
          <a class="no_blur" href="#">{{spec}}</a>
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
