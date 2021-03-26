<template>

  <div class="component">
    <div class="form col-lg-6 col-md-12">
        <div class=" input_container no_blur">
          <input class="form-control text-capitalize no_blur" type="text" name="searchbar" placeholder="Start typing a specialization"
            v-model="search"
            @keyup="specFilter(search)"
            @click="showList()"
          >
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
    </div>

    <div class="doctors_show">

      <div class="page_controller">
        <div class="arrow left" @click="prev()"><i class="fas fa-chevron-left"></i></div>
        <div class="arrow page"> {{pages.current}} of {{pages.total}}</div>
        <div class="arrow right" @click="next()"><i class="fas fa-chevron-right"></i></div>
      </div>

      <div class="card_container d_flex">

        <div class="card_wrapper" v-for="(user, index) in filterUsers.slice(cards*(pages.current - 1), cards*pages.current)" :key="index">
          <a :href="'/doctor/'+user.slug" class="card">

            <div class="avatar" v-if="user.profile_img != null">
              <div class="profile" v-bind:style="{ 'background-image': 'url( storage/' + user.profile_img + ')' }"></div>
            </div>
            <!-- Fallback image -->
            <div class="avatar" v-else>
              <div class="profile" style="background-image:url(img/user-default.jpg)"></div>
            </div>

            <div class="name">{{user.name+" "+user.lastname}} </div>
            <div class="specialization" >
              <span v-for="(spec, index) in user.specializations" :key="index">{{spec.name}} </span>
            </div>
            <div class="rating">
              <i v-for="(vote, index) in user.avgVote" :class="(vote === 1)?'fas fa-star':'far fa-star'" :key="index"></i>
            </div>
            <p class="description">{{user.body}}</p>
          </a>
        </div>

      </div>


    </div>
  </div>

</template>

<script>
    export default {
      props: ["img", "api", "users"],
      data: function () {
        return {
          filterUsers: [],
          filterSpec: [],
          doctor: [],
          specializations: [],
          imgPath: this.img,
          show: false,
          list: null,
          search: '',
          cards: 12,
          pages: {
            current: 1,
            total: 1,
          },
          rating: 0,
        }
      },
      methods: {
        /**
         * Filtra le specializzazioni tra quelle rese disponibili dai medici iscritti al sito
         */
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

        /** 
         * Mostra le lista delle specializzazioni quando viene cliccata la barra di ricerca 
        */
        showList: function(){
          if(!this.show){
            return this.show = true;
          }
        },

        /**
         * Imposta il valore del cookie con il parametro di ricerca
         */
        cookie: function() {
          return document.cookie = "search="+this.search;
        },

        /**
         * 1. Fa' coincidere il valore mostrato sulla barra di ricerca con una delle specializzazio mostrate nel menu a scomparsa
         * 2. Filtra i medici selezionando quelli che presentano la specializzazione cercata.
         * 3. Calcola il numero di "pages" che occorrono per mostrare un dato numero di "cards"
         */
        writeSpec: function(selectedSpec){
          this.search = selectedSpec;
          if(selectedSpec.toLowerCase() === "all"){
            this.filterUsers = this.users;
          }
          else{
            this.filterUsers = [];
            this.users.forEach(user =>{
              user.specializations.forEach(spec => {
                if(spec.name.toLowerCase() === selectedSpec.toLowerCase()){
                  this.filterUsers.push(user);
                }
              });
            });
          }
          this.pages.total = Math.ceil(this.filterUsers.length / this.cards);
          if(this.pages.total === 0){this.pages.total = 1;}
        },
        /**
         * Compila l'elenco delle specializzazioni sulla base degli "users" presenti
         * Calcola la media dei voti ricevuti dagli utenti "*****"                
         */ 
        querySpec: function(users){
          users.forEach(doctor=>{
            let vote = 0;
            let avgVote = 0;
            let floorVote = 0;
            let counter = 0;
            doctor.specializations.forEach(spec=>{
              if(!this.specializations.includes(spec.name.toLowerCase())){
                return this.specializations.push(spec.name.toLowerCase());
              }
            });
            doctor.reviews.forEach(review =>{
              counter++;
              vote += review.vote; 
            });
            avgVote = vote/counter;
            floorVote = Math.floor(avgVote);
            avgVote = [0,0,0,0,0];
            for(let i = 0; i < floorVote; i++){
              avgVote[i] = 1;
            }
            doctor.avgVote = avgVote;
            console.log(doctor.name, doctor.avgVote); 
          });
        },

        /** 
         * Effettua il passaggio alla pagina successiva
        */
        next: function() {
          if(this.pages.current >= this.pages.total){return;}
          return this.pages.current++
        },
        /**
         * Effettua il passaggio alla pagina precedente
         */
        prev: function(){
          if(this.pages.current <= 1){return;}
          return this.pages.current--
        }

      },

      mounted() {
        self = this;
        /**
         * Chiamata al database per importare tutti gli "users"
         */
        axios
        .get(self.api) //.get('api/users')
        .then(response => {
              self.users = response.data.data;
              /**
              * Compila l'elenco delle specializzazioni sulla base degli "users" presenti                
              */
              self.querySpec(self.users);
              /** 
              * Inserisce il valore "all" all'inizio dell'array contenente le specializzazioni
              */
              self.specializations.unshift("all");
              /**
               * Trigger iniziale sul valore passato dalla pagina "home"
              */
              self.writeSpec((self.search != "")? self.search : "all"); 
              
              
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
        /**
         * Rimozione dell'eventlistener alla chiusura della pagina
         */
        document.removeEventListener('click');
        document.cookie;
      },
    }
</script>
