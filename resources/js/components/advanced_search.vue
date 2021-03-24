<template>
    <div class="col-lg-5 col-md-12">
        <input class="form-control text-capitalize" type="text" name="" v-model="search" placeholder="Search for Specializations">
    </div>
</template>
<script>
export default {
  data: function(){
      return {
          search: "",
          searchArray: [],
      }
  },
  mounted() {
    this.searchArray = document.cookie.split('; ')
    this.searchArray.forEach(string=>{
      if(string.length < 99) {
        this.search = string;
      }
    })
  }
}
</script>
