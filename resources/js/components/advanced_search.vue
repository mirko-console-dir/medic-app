<template>

  <div class="component">
    <form  class="col-lg-6 col-md-12"  autocomplete="off">

        <div class=" input_container no_blur">
          <input class="form-control text-capitalize no_blur" type="text" name="" placeholder="Start typing a specialization"
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

        <div class="card_wrapper" v-for="user in users.slice(items*(page - 1), items*page)">
          <a :href="'/doctor/'+user.slug" class="card">

            <div class="avatar" v-if="user.profile_img != null">
              <div class="profile" v-bind:style="{ 'background-image': 'url( storage/' + user.profile_img + ')' }"></div>
            </div>
            <!-- Fallback image -->
            <div class="avatar" v-else>
              <div class="profile" style="background-image:url(img/user-default.jpg)"></div>
            </div>


            <h4 class="name">{{user.name+" "+user.id}} </h4>
            <h4 class="specialization" >
              <span v-for="spec in user.specializations">{{spec.name}} </span>
            </h4>
            <div class="rating">*****</div>
            <p class="description">{{user.body}}</p>
          </a>
        </div>

      </div>

      <div class="page_controller">
        <div class="arrow left" @click="prev()"><i class="fas fa-chevron-left"></i></div>
        <div class="arrow right" @click="next()"><i class="fas fa-chevron-right"></i></div>
      </div>

    </div>
  </div>

</template>

<script>
    export default {
      props: ["img", "api"],
      data: function () {
        return {
          users: [],
          filterDoctors: [],
          filterSpec: [],
          doctor: [],
          specializations: [],
          apiRequest: this.api,
          imgPath: this.img,
          show: false,
          list: null,
          search: '',
          items: 12,
          page: 1,
          array: [],

          }
      },
      computed: {


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

        next: function() {
          if(this.page*this.items > this.users.length){
            return console.log("page", this.page);
          }
          return this.page++
        },

        prev: function(){
          if(this.page < 2){
            return console.log("page", this.page);
          }
          return this.page--
        }
      },
      created(){
        /**
        * Creare dei fake user
        */
        const fakeUser =
        {
        id: 1,
        name: "Marco",
        lastname: "Marconi",
        email: "marco.marconi@email.com",
        address: "via degli indirizzi 11",
        register_number_doc: "0000123456",
        cv_img: null,
        profile_img: "img/sponsored/profile_01.jpg",
        phone_number: "0721 212223",
        slug: null,
        created_at: "2021-03-25T10:20:30.000000Z",
        updated_at: "2021-03-25T10:20:30.000000Z",
        prefix_id: "+39",
        prefixes: null,
        specializations: [
          "Immunology",
          "Neurology"
          ],
        sponsorships: [
          "exclusive"
          ],
        }
        //let newFakeUser = this.fakeUser;
        for (let i = 0; i < 12; i++){
          this.array.push(fakeUser);
          this.array[i].id = i+1;
          this.array[i].profile_img = "img/sponsored/profile_0"+(i+1)+".jpg";
        }
      },
      mounted() {
        self = this;
        axios
        .get(self.apiRequest) //.get('api/users')
        .then(response => {
              self.users = response.data.data;
              console.log(self.users);

              //Creazione Elenco specializzazioni
              self.users.forEach(doctor=>{
                doctor.specializations.forEach(spec=>{
                  if(!self.specializations.includes(spec.name.toLowerCase())){
                    return self.specializations.push(spec.name.toLowerCase());
                  }
                });
              });
              //

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
