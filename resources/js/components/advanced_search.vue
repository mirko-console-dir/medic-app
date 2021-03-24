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
      }
  },
  mounted() {

    if(document.cookie.includes("search")){
      this.search = document.cookie.split('; ')
      .find(row => row.startsWith('search='))
      .split('=')[1];
      document.cookie = "search=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
  }
}
</script>
