<template>

  <div class="component">
    <div class="form col-lg-6 col-md-12">
        <div class=" input_container no_blur">
          <input class="text-capitalize no_blur" type="text" name="searchbar" placeholder="Start typing a specialization" autocomplete="off"
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
          <a :href="`/doctor/${user.slug}`" class="card">
            <div class="avatar">
              <div class="profile" :style="`background-image:url(storage/${user.profile_img != null ? user.profile_img: '../img/user-default.jpg'})`"></div>
            </div>

            <div class="info name">{{user.name}} {{user.lastname}}</div>
            <div class="info specializations">
              <div class="specialization" v-for="(spec, index) in user.specializations" :key="index">{{spec.name}} </div>
            </div>
            <div class="info rating">
              <i v-for="(vote, index) in user.avgVote" :class="(vote)?'fas fa-star':'far fa-star'" :key="index"></i>
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
          window: {       // dichiarazione iniziale per la variabile window
                width: 0,
                height: 0,
            },
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
              filter = ["No results found"];
            }
          }
          return this.filterSpec = filter;
        },

        /** 
         * Mostra le lista delle specializzazioni quando viene cliccata la barra di ricerca 
        */
        showList: function(initial){
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
          this.totalPages();
        },
        /**
         * Compila l'elenco delle specializzazioni sulla base degli "users" presenti
         * Calcola la media dei voti ricevuti dagli utenti "*****"                
         */ 
        querySpec: function(users){
          users.forEach(doctor=>{
            doctor.specializations.forEach(spec=>{
              if(!this.specializations.includes(spec.name.toLowerCase())){
                return this.specializations.push(spec.name.toLowerCase());
              }
            });
          });
        },
        /**
         * Calcolo della media dei voti
        */
        queryVote: function(users){
          users.forEach(doctor=>{
            let vote = 0;
            let avgVote = 0;
            let floorVote = 0;
            let counter = 0;
            doctor.reviews.forEach(review =>{
              counter++;
              vote += review.vote;
            });
            avgVote = vote/counter;
            floorVote = Math.floor(avgVote);
            avgVote = [false, false, false, false, false];
            for(let i = 0; i < floorVote; i++){
              avgVote[i] = true;
            }
            doctor.avgVote = avgVote;
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
        },
        /**
         * Ricalcola il numero di pagine da visualizzare
         */
        totalPages: function(){
          this.pages.total = Math.ceil(this.filterUsers.length / this.cards);
          if(this.pages.total === 0){this.pages.total = 1;}
        },
        /**
         * Calcola il numero di "pages" che occorrono per mostrare un dato numero di "cards"
        */
        cardsMediaQuery: function() {
            this.window.width = window.innerWidth;
            this.window.height = window.innerHeight;
            //tablet
            if(window.innerWidth <= 992 && window.innerWidth > 768) {
              this.cards = 8;
              this.pages.current = 1;
            }
            //mobile
            else if(window.innerWidth  <= 768){
              this.cards = 6;
              this.pages.current = 1;
            }
            //desktop
            else if(window.innerWidth  > 992){
              this.cards = 12;
              this.pages.current = 1;
            }
            this.totalPages();
        },
        /** 
         * Se il dottore ha sottoscritto una sponsorizzazione, il suo profilo viene caricato tra i primi all'interno del carosello.
        */
        sposoredDoctors: function(users){ 
            let lastSponsorship = [];
            const today = new Date();
            let expire = new Date();
            users.forEach((doctor, index) =>{
                doctor.sponsored = false;
                lastSponsorship = doctor.sponsorships[doctor.sponsorships.length - 1];
                let lastSponsorshipData = new Date(lastSponsorship.created_at);
                if(lastSponsorship.name != "free"){
                    expire.setDate(lastSponsorshipData.getDate() + lastSponsorship.duration/24);
                    if(today < expire){
                        users.splice(index, 1);
                        users.unshift(doctor);
                        return doctor.sponsored = true;
                    }
                }
            });
        },
        /**
         * Rimuove l'admin dall'array users
        */
        adminRemove: function(users){
         return users.shift()
        },

      },
      created(){
        window.addEventListener('resize', this.cardsMediaQuery);
      },
      mounted() {
        /**
         * Chiamata al database per importare tutti gli "users"
         */
        axios
        .get(this.api) //.get('api/users')
        .then(response => {
              this.users = response.data.data;
        })
        .then(()=>{
          /** 
           * Rimuove l'admin
          */
          this.adminRemove(this.users);
          /**
          * Compila l'elenco delle specializzazioni sulla base degli "users" presenti                
          */
          this.querySpec(this.users);
          /** 
           * Calcola la media dei voti ricevuti dagli utenti
           */
          this.queryVote(this.users);
          /** 
          * Inserisce il valore "all" all'inizio dell'array contenente le specializzazioni
          */
          this.specializations.unshift("all");
           /** 
           * Riordina gli utenti sulla base della sposorizzazione sottoscritta.
           */
           this.sposoredDoctors(this.users);
          /**
           * Trigger iniziale sul valore passato dalla pagina "home"
          */
          this.writeSpec((this.search != "")? this.search : "all"); 
          /**
           * Trigger iniziale per determinare il numero di cards da mosttrare in base alla larghezza della finestra.
           */
          this.cardsMediaQuery();
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
        window.removeEventListener('resize', this.cardsMediaQuery);
        document.removeEventListener('click');
        document.cookie;
      },
    }
</script>
