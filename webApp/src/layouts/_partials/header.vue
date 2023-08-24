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
                    <li class="nav-item active">
                        <router-link :to="{name: 'login'}" class="nav-link">
                            <a href="" class="nav-link"></a>
                        </router-link>
                    </li>
                         
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


<style scoped>
.app-header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  height: 80px;
  display: flex;
  align-items: center;
}

.navbar-brand {
  display: flex;
  align-items: center;
  color: #fff;
  text-decoration: none;
}

.logo {
  width: 40px;
  height: 40px; 
  margin-right: 10px;
}
</style>

