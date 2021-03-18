<template>
    <div id="slideshow">
        <i class="fa fa-chevron-left" @click="prev()"></i>
        <div class="card_container">
            <transition-group id="card-complete" name="card-complete" tag="div">
                <div class="card-complete-item"  :style="{'width': cardWidth}" v-for="profile in profiles.slice(i,i+show)" :key="profile.id">
                    <div class="info avatar" :style="{ 'background-image': 'url('+image.path+profile.id+image.ext+')' }"></div>
                    <h4 class="info name">{{profile.sex === 'm'?'Dott.':'Dott.ssa'}} {{profile.name}} {{profile.lastname}}</h4>
                    <h4 class="info specialization">{{profile.specialization}}</h4>
                    <p class="info presentation">{{profile.presentation}}</p>
                    <!-- <a class="info presentation" href="/dashboard/doctors/{doctor}">link</a> -->
                </div>
            </transition-group>
        </div>
        <i class="fa fa-chevron-right" @click="next()"></i>
    </div>
</template>
<script>

module.exports = {
    props: ['homeRoute'],
    data: function () {
        return {
            
            show: 4,
            size: {
                sm: 1,
                md: 2,
                lg: 3,
                xl: 4,
            },              // card mostrate contemporaneamente
            cardWidth: 1,   // larghezza card in percentuale 
            i: 0,           // puntatore nell'array profiles
            window: {       // dichiarazione iniziale per la variabile window
                width: 0,
                height: 0,
            },
            image:{
                path: 'img/sponsored/profile_',
                ext: '.jpg'
                },
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
        prev: function() {
            let i = this.i;
            i--;
            if(i < 0){
                return this.i = this.profiles.length - this.show;
            }
            return this.i = i;
            
        },
        next: function() {
            let i = this.i;
            i++;
            if(i > this.profiles.length - this.show){
                return this.i = 0;
            }
            return this.i = i;
        },
        /** Shows the window width and height 
        *   
        */
        handleResize: function() {
            this.window.width = window.innerWidth;
            this.window.height = window.innerHeight;
        },
        cardMediaQuery: function() {
            if(window.innerWidth < 991.98 && window.innerWidth > 768) {
                this.show = this.size.md;
            }
            else if(window.innerWidth  > 992 && window.innerWidth  < 1199.98){
                this.show = this.size.lg;
            }
            else if(window.innerWidth  < 767.98){
                this.show = this.size.sm;
            }
            else if(window.innerWidth  > 1200){
                this.show = this.size.xl;
            }
            this.cardWidth = (1/this.show);
        }

    },
    created() {
        window.addEventListener('resize', this.handleResize);
        window.addEventListener('resize', this.cardMediaQuery);
        this.handleResize();
        this.cardMediaQuery();

    },
    mounted() {
        console.log('Component Slideshow');
    },

    distroyed() {
        window.removeEventListener('resize', this.handleResize);
        window.removeEventListener('resize', this.cardMediaQuery);
    },
}
</script>