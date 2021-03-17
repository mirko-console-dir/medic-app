<template>
  <form class="col-lg-6 col-sm-12 d_flex" action="/search" method="post">
    <input type="text" name="search" placeholder="Search for a doctor here">
    <button type="submit" name="button">GO</button>
  </form>
</template>

<script>
    export default{
      
      data: function () {
        return {

        }
      },

      mounted() {

      }
    }
</script>
