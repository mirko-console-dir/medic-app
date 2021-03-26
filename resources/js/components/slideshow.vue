<!-- nuovo -->
<template>
    <div id="slideshow">
        <i class="fa fa-chevron-left" @click="prev()"></i>
        <div class="card_container">
            <transition-group id="card-complete" name="card-complete" tag="div">
                <div class="card-complete-item"  :style="{'width': cardWidth}" v-for="profile in activeProfiles" :key="profile.id">
                    <div class="info avatar" :style="{ 'background-image': 'url('+image.path+profile.id+image.ext+')' }"></div>
                    <h4 class="info name">{{profile.sex === 'm'?'Dott.':'Dott.ssa'}} {{profile.name}} {{profile.lastname}}</h4>
                    <h4 class="info specialization">{{profile.specialization}}</h4>
                    <p class="info presentation">{{profile.presentation}}</p>
                    <!-- <a class="info presentation" :href="'/doctor/'+user.slug">ID: {{profile.id}}</a> -->
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
    props: ['homeRoute'],
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
            image:{
                path: 'img/sponsored/profile_',
                ext: '.jpg'
                },
            activeProfiles: [],
            profiles: [
                {
                id: '01',
                name: 'laura',
                lastname: 'sforza',
                specialization: 'Neurologo',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '02',
                name: 'Luca',
                lastname: 'Giurato',
                specialization: 'Logopedista',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '03',
                name: 'Paolo',
                lastname: 'Muti',
                specialization: 'Dermatologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '04',
                name: 'Mr.',
                lastname: 'T',
                specialization: 'Osteopata',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '05',
                name: 'laura',
                lastname: 'Impegno',
                specialization: 'Ginecologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '06',
                name: 'Gianluca',
                lastname: 'Vacchi',
                specialization: 'Esperto in tricologia',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '07',
                name: 'Alfiero',
                lastname: 'Marzi',
                specialization: 'Psichiatra',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '08',
                name: 'Maarishi',
                lastname: 'Ajeje',
                specialization: 'Ginecologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '09',
                name: 'Gina',
                lastname: 'Cugini',
                specialization: 'Pediatra',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '10',
                name: 'Marco',
                lastname: 'Mitici',
                specialization: 'Ginecologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '11',
                name: 'Marta',
                lastname: 'Formicola',
                specialization: 'Sensitiva',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                id: '12',
                name: 'Laura',
                lastname: 'Dinotte',
                specialization: 'Oculista',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
            ],
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
                this.next(true);
                this.show = this.size.md; //2
            }
            //mobile
            else if(window.innerWidth  <= 768){
                this.next(true);
                this.show = this.size.sm; //1
            }
            //desktop
            else if(window.innerWidth  > 992){
                this.next(true);
                this.show = this.size.lg; //3
            }
            return this.cardWidth = (1/this.show);
        }
    },
    created() {
        window.addEventListener('resize', this.cardMediaQuery);
        this.cardMediaQuery();
    },
    mounted() {
        

        this.i = 0;
        this.j = this.i + 1;
        this.k = this.i + 2;
        this.l = this.i + 3;
        this.next(true);
        console.log('Component "Slideshow" mounted');
    },
    distroyed() {
        window.removeEventListener('resize', this.cardMediaQuery);
    },
}
</script>

