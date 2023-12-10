<template>
  <div>
      <SideBar />
  </div>
</template>

<script>
  import '@/assets/css/auth.css'
  import 'bootstrap'
  import 'bootstrap/dist/css/bootstrap.min.css'
  import SideBar from '@/components/SideBar.vue'
  import { mapActions, mapState } from 'vuex';  

  export default {

    created() {
      if (this.me.username === '') {
        return this.$router.push({name: 'home'})
      }
    },
    
    computed: {
      ...mapState({
        me: state => state.auth.me
      }),  
    },

    components: {
      SideBar
    },

  }

</script>