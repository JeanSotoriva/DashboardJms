<template>
  <div>
    <ul>
      <li class="m-1 text-black">
        <h1>Bem vindo {{ me.username }} !</h1>
      </li>
    </ul>
  </div>
</template>

<script>
  import '@/assets/css/auth.css'
  import 'bootstrap'
  import 'bootstrap/dist/css/bootstrap.min.css'
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
    },

  }

</script>