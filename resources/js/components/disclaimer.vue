<template>
    <div id="disclaimer" :class="noshow? 'noactive' : ''">
        <div class="content">
            Questo sito web utilizza i cookie. Utilizziamo i cookie per personalizzare contenuti ed annunci, per fornire funzionalità dei social media e per analizzare il nostro traffico. Condividiamo inoltre informazioni sul modo in cui utilizza il nostro sito con i nostri partner che si occupano di analisi dei dati web, pubblicità e social media, i quali potrebbero combinarle con altre informazioni che ha fornito loro o che hanno raccolto dal suo utilizzo dei loro servizi.
        </div>
        <div class="buttons">
            <div class="button green" @click="accept">Accept all cookies</div>
            <div class="button blue" @click="accept">Gestisci le tue preferenze</div>
        </div>
    </div>
</template>

<script>
export default {
    data: function(){
        return{
            noshow: true,
            cancel: null,
        }
    },
    methods:{
        accept: function(){
            if(!this.noshow){
                this.noshow = true;
                clearInterval(this.clear);
                console.log(this.noshow);
                return this.show;
            }
        },
        show: function(){
            if(this.noshow){
                this.noshow = false;
            }
        }
    },
    mounted(){
        this.clear = setInterval(this.show, 3000);
    }
}
</script>