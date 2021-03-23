<template>
    <div>
        <input class="form-control" type="text" name="" v-model="search">
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
        //this.search = this.searchArray.find('search=');
        this.search = this.searchArray[this.searchArray.length -1];
    }
}
</script>
