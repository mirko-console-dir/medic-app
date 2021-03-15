<template>
    <div class="container_100 w_100">
        <div class="card" v-for="profile in profiles">
            <img class="avatar" :src="profile.image" alt="profile doctor image">
            <div class="name">{{profile.name}}</div>
            <div class="specialization">{{profile.specialization}}</div>
            <div class="presentation">{{profile.presentation}}</div>
        </div>
    </div>
</template>

<script>
module.exports = {
    data: function () {
        return {
            profiles: [
                {
                image: 'img/avatar.png',
                name: 'Gino Pasticcino',
                specialization: 'Ginecologo',
                presentation: 'agif al aviv!'
                },
                {
                image: 'img/avatar.png',
                name: 'Gino Pasticcino',
                specialization: 'Ginecologo',
                presentation: 'agif al aviv!'
                },
                {
                image: 'img/avatar.png',
                name: 'Gino Pasticcino',
                specialization: 'Ginecologo',
                presentation: 'agif al aviv!'
                },
                {
                image: 'img/avatar.png',
                name: 'Gino Pasticcino',
                specialization: 'Ginecologo',
                presentation: 'agif al aviv!'
                },
                {
                image: 'img/avatar.png',
                name: 'Gino Pasticcino',
                specialization: 'Ginecologo',
                presentation: 'agif al aviv!'
                },
            ],
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>