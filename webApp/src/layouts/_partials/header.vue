<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-vuefood">
      <div class="container">
        <div class="logo">
          <router-link :to="{name: 'dashboard'}" class="navbar-brand ">
            Bem vindo!
          </router-link>
        </div>
        <div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <router-link :to="{name: 'home'}" v-if="me.username" class="nav-link">
                Olá {{ me.username }} !(<span @click.prevent="logout">sair</span>)
              </router-link>  
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>


<script>
  import { mapState, mapActions } from 'vuex'

export default {
  name: 'header',

  computed: {
    ...mapState({
      me: state => state.auth.me
    })
  },

  methods: {
    ...mapActions([
      'logout'
    ]),
  },
}
</script>

/assets/css/default.css
<style scoped>
  @import url('@/assets/css/default.css');
</style>