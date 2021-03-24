<template>

  <div class="component">
    <form  class="col-lg-6 col-md-12"  autocomplete="off">

        <div class=" input_container no_blur">
          <input class="form-control text-capitalize no_blur" type="text" name="" placeholder="start typing a specialization"
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

    <div class="doctors_show">
      <div class="card_container d_flex">
        <div class="card_wrapper">
          <a href="#" class="card">
            <div class="avatar"></div>
            <h4 class="name">Dott.ssa Cippa lippa</h4>
            <h4 class="specialization">Neurologia</h4>
            <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod reiciendis nulla fuga corporis, dolorem dignissimos quae quisquam aperiam sint nisi.</p>
            <div class="rating">*****</div>
          </a>
        </div>
      </div>
    </div>
  </div>

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
        * Se il cookie contiene una chiave di ricerca, questa viene estratta.
        * Alla chiusura della pagina il cookie viene cancellato.
        */
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
          if(!event.target.className.includes('no_blur')){
            return this.show = false;
          }
        });

        console.log('Component "Advanced-search" mounted');
      },

      destroyed(){
        document.removeEventListener('click');
      },
    }
</script>
