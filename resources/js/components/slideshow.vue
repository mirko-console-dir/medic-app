<template>
    <div id="slideshow">
        <i class="fa fa-chevron-left" @click="prev"></i>
        <div class="card_container">
            <div class="card" :style="{width: cardWidth}" v-for="(profile, index) in profiles.slice(i,i+show)">
                <img class="info avatar" :src="profile.image" alt="profile doctor image">
                <h4 class="info name">{{profile.sex === 'm'?'Dott.':'Dott.ssa'}} {{profile.name}} <br> {{profile.lastname}}</h4>
                <h4 class="info specialization">{{profile.specialization}}</h4>
                <p class="info presentation">{{profile.presentation}}</p>
            </div>
        </div>
        <i class="fa fa-chevron-right" @click="next"></i>
    </div>
</template>
<script>

module.exports = {
    data: function () {
        return {
            
            show: 4,
            size: {
                sm: 1,
                md: 2,
                lg: 4
            },              // card mostrate contemporaneamente
            cardWidth: 1,   // larghezza card in percentuale 
            i: 0,           // puntatore nell'array profiles
            window: {       // dichiarazione iniziale per la variabile window
                width: 0,
                height: 0,
            },
            profiles: [
                {
                image: 'img/avatar.png',
                name: 'Massimo',
                lastname: '1',
                specialization: 'Ginecologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?!'
                },
                {
                image: 'img/avatar.png',
                name: 'Lupo',
                lastname: '2',
                specialization: 'Ginecologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
                },
                {
                image: 'img/avatar.png',
                name: 'Natale',
                lastname: '3',
                specialization: 'Ginecologo',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
                },
                {
                image: 'img/avatar.png',
                name: 'Massimo',
                lastname: '4',
                specialization: 'Ginecologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
                },
                {
                image: 'img/avatar.png',
                name: 'Ultimo',
                lastname: '5',
                specialization: 'Ginecologo',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
                },
                {
                image: 'img/avatar.png',
                name: 'Massimo',
                lastname: '6',
                specialization: 'Ginecologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
                },
                {
                image: 'img/avatar.png',
                name: 'Ultimo',
                lastname: '7',
                specialization: 'Ginecologo',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
                },
                {
                image: 'img/avatar.png',
                name: 'Massimo',
                lastname: '8',
                specialization: 'Ginecologo',
                sex: 'm',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
                },
                {
                image: 'img/avatar.png',
                name: 'Ultimo',
                lastname: '9',
                specialization: 'Ginecologo',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
                },
                {
                image: 'img/avatar.png',
                name: 'Ultimo',
                lastname: '10',
                specialization: 'Ginecologo',
                sex: 'f',
                presentation: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente blanditiis consectetur soluta magni ab officiis assumenda odit cum voluptate fuga, omnis ea laboriosam adipisci tempore?'
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
            if(window.innerWidth < 991 && window.innerWidth > 768) {
                this.show = this.size.md;
            }
            else if(window.innerWidth  > 992){
                this.show = this.size.lg;
            }
            else{
                this.show = this.size.sm;
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