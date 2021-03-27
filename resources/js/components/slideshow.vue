<!-- nuovo -->
<template>
    <div id="slideshow">
        <i class="fa fa-chevron-left" @click="prev()"></i>
        <div class="card_container">
            <transition-group id="card-complete" name="card-complete" tag="div">
                <div class="card-complete-item" :style="{'width': cardWidth}" v-for="profile in activeProfiles" :key="profile.id">
                    <div class="info avatar" :style="{ 'background-image': 'url(storage/'+profile.profile_img+')' }"></div>
                    <h4 class="info name">Dr. {{profile.name}} {{profile.lastname}}</h4>
                    <h4 class="info specialization" v-for="(spec, index) in profile.specializations" :key="index">{{spec.name}} </h4>
                    <p class="info presentation">{{profile.body}}</p>
                    <a class="info presentation" :href="'/doctor/'+profile.slug"> show more </a>
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
        /** Shows the window width and height 
        *   
        */
        cardMediaQuery: function() {
            this.window.width = window.innerWidth;
            this.window.height = window.innerHeight;
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
            return this.cardWidth = (1/this.show);
        }
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
            //console.log(this.profiles);
            this.i = 0;
            this.j = this.i + 1;
            this.k = this.i + 2;
            this.l = this.i + 3;
            this.next(true);
            this.cardMediaQuery();

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

