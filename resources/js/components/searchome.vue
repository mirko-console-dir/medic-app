<template>
  <form class="col-lg-6 col-sm-12 d_flex" action="/search" method="post">
    <input type="text" name="search" placeholder="Search for a doctor here" v-model="search">
    <div @click="specFor()">Click</div>
    <!-- <button type="submit" name="button">GO</button> -->
    <p style="color: white">{{filterUsers}}</p>

  </form>
</template>

<script>
    module.exports = {
      
      data: function () {
        return {
          users: [],
          search: '',
          filterDoctors: [],
          doctor: [],
        }
      },
      methods: {
        specFor: function(){
          this.filterDoctors = [];
          this.users.forEach(doctor=>{
            doctor.specializations.forEach(spec =>{
              if(spec.name === this.search){
                return this.filterDoctors.push(doctor.name);
              }
            });
          });
        }
      },
      mounted() {
        console.log('Component "Searchhome" mounted');
        axios
        .get('api/users')
        .then(response => {
            console.log(response.data.data);
            this.users = response.data.data;
        })
        .catch(error => {
            console.log(error);
        })
      },
    }
</script>
