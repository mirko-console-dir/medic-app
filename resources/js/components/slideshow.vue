<!-- nuovo -->
<template>
    <div id="slideshow">
        <i class="fa fa-chevron-left" @click="prev()"></i>
        <div class="card_container">
            <transition-group id="card-complete" name="card-complete" tag="div">
                <div class="card-complete-item" :style="{ 'flex-basis': cardWidth }" v-for="profile in activeProfiles" :key="profile.id">
                    <div class="info avatar" :style="{ 'background-image': 'url(storage/'+profile.profile_img+')' }"></div>
                    <h4 class="info name">Dr. {{profile.name}} {{profile.lastname}}</h4>
                    <div class="info rating">
                        <i v-for="(vote, index) in profile.avgVote" :class="(vote)?'fas fa-star':'far fa-star'" :key="index"></i>
                    </div>
                    <h4 class="info specialization" v-for="(spec, index) in profile.specializations.slice(0,1)" :key="index">{{spec.name}} </h4>
                    <p class="info presentation">{{profile.body}}</p>
                    <a class="info showmore" :href="'/doctor/'+profile.slug"> show more </a>
                </div>
            </transition-group>
        </div>
        <i class="fa fa-chevron-right" @click="next()"></i>
    </div>
</template>
<script>

/** Il carosello così impostato può visualizzare fino a un massimo di 4 card.
*
*/
export default {
    props: ["homeRoute", "api", "profiles"],
    data: function () {
        return {
            show: 0,
            size: {
                sm: 1,
                md: 2,
                lg: 3,
                xl: 4,
            },              // card mostrate contemporaneamente
            cardWidth: 1,   // larghezza card in percentuale 
            i: 0,
            j: 0,
            k: 0,
            l: 0,           // puntatore nell'array profiles
            window: {       // dichiarazione iniziale per la variabile window
                width: 0,
                height: 0,
            },
            activeProfiles: [],
        }
    },
    methods: {
        prev: function(initial) {
            let i = this.i;
            let j = this.j;
            let k = this.k;
            let l = this.l;
            let show = this.show;
            let activeProfiles = this.profiles;
            let profilesLength = this.profiles.length;
            
            if(!initial){
                i--; j--; k--; l--;
            }
            
            if(i < 0){
                i = profilesLength - 1;
            }
            if(j < 0){
                j = profilesLength - 1;
            }
            if(k < 0){
                k = profilesLength - 1;
            }
            if(l < 0){
                l = profilesLength - 1;
            }

            if(show === 1){
                activeProfiles = [activeProfiles[i]];
            }
            else if(show === 2){
                activeProfiles = [activeProfiles[i], activeProfiles[j]];
            }
            else if(show === 3){
                activeProfiles = [activeProfiles[i], activeProfiles[j], activeProfiles[k]];
            }
            else if(show === 4){
                activeProfiles = [activeProfiles[i], activeProfiles[j], activeProfiles[k], activeProfiles[l]];
            }

            // console.log("l = ", l);
            // console.log("k = ", k);
            // console.log("j = ", j);
            // console.log("i = ", i);
            
            this.i = i;
            this.j = j;
            this.k = k;
            this.l = l;
            
            return this.activeProfiles = activeProfiles;
        },

        next: function(initial) {
            let i = this.i;
            let j = this.j;
            let k = this.k;
            let l = this.l;
            let show = this.show;
            let activeProfiles = this.profiles;
            let profilesLength = this.profiles.length;
            
            if(!initial){
                i++; j++; k++; l++;
            }
            if(l > profilesLength - 1){
                l = 0;
            }
            if(k > profilesLength - 1){
                k = 0;
            }
            if(j > profilesLength - 1){
                j = 0;
            }
            if(i > profilesLength - 1){
                i = 0;
            }

            if(show === 1){
                activeProfiles = [activeProfiles[i]];
            }
            else if(show === 2){
                activeProfiles = [activeProfiles[i], activeProfiles[j]];
            }
            else if(show === 3){
                activeProfiles = [activeProfiles[i], activeProfiles[j], activeProfiles[k]];
            }
            else if(show === 4){
                activeProfiles = [activeProfiles[i], activeProfiles[j], activeProfiles[k], activeProfiles[l]];
            }

            // console.log("l = ", l);
            // console.log("k = ", k);
            // console.log("j = ", j);
            // console.log("i = ", i);
            
            this.i = i;
            this.j = j;
            this.k = k;
            this.l = l;

            return this.activeProfiles = activeProfiles;
        },
        /**  
        * Cambia il numero di cards da mostrare in base alla larghezza della finestra.   
        */
        cardMediaQuery: function() {
            this.window.width = window.innerWidth;
            this.window.height = window.innerHeight;
            let width = 0;
            //tablet
            if(window.innerWidth <= 992 && window.innerWidth > 768) {
                this.show = this.size.md; //2
            }
            //mobile
            else if(window.innerWidth  <= 768){
                this.show = this.size.sm; //1
            }
            //desktop
            else if(window.innerWidth  > 992){
                this.show = this.size.lg; //3
            }
            this.next(true);
            width = (100/this.show);
            this.cardWidth = width.toString() + '%';
            //console.log(this.cardWidth);
            return this.cardWidth;
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
                console.log(`lastSponsorshipData ${lastSponsorshipData}`);
                if(lastSponsorship.name != "free"){
                    expire.setDate(lastSponsorshipData.getDate() + lastSponsorship.duration/24);
                    console.log(`${doctor.name}; expire date: ${expire}`);
                    if(today < expire){
                        users.splice(index, 1);
                        users.unshift(doctor);
                        return doctor.sponsored = true;
                    }
                }
            });
        },

        /**
         * Calcolo della media dei voti
        */
        avgVote: function(users){
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
            //console.log(doctor.name, doctor.avgVote); 
          });
        },

        /**
         * Rimuove l'admin dall'array users
        */
        adminRemove: function(users){
         return users.shift()
        },

    },
    created() {
            window.addEventListener('resize', this.cardMediaQuery);
    },
    mounted() {
        /**
         * Chiamata al database per importare tutti gli "users"
         */
        axios
        .get(this.api) //.get('api/users')
        .then(response => {
            this.profiles = response.data.data;

            this.i = 0;
            this.j = this.i + 1;
            this.k = this.i + 2;
            this.l = this.i + 3;
            this.adminRemove(this.profiles);
            this.avgVote(this.profiles);
            //console.log(this.profiles);
            this.sposoredDoctors(this.profiles);
            this.cardMediaQuery();
            this.next(true);

        })
        .catch(error => {
            console.log(error);
        });

        console.log('Component "Slideshow" mounted');
    },
    distroyed() {
        window.removeEventListener('resize', this.cardMediaQuery);
    },
}
</script>

