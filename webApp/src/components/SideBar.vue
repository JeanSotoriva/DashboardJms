<template>
  <nav class="sidebar">
    <div class="sidebar-header sidebar-title">
        
        <div class="logo">
          <router-link to="/dashboard">
            <img src="@/assets/imgs/logo.png" alt="Logo" class="logo-image">
          </router-link>
          <h3>Dashboard</h3>
        </div>
    </div>
    <p></p>
    <ul class="sidebar-menu">
      <li></li>
      <li class="menu-heading">Usuario Logado:</li>
      <li>
        <strong>{{me.username}}</strong>
      </li>
      <li class="menu-heading">Opções</li>
      <li>
        <router-link to="/dashboard/usuarios">
          <i class="fas fa-users"></i>
          Usuários
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/colaboradores">
          <i class="fas fa-users"></i>
          Colaboradores
        </router-link>
      </li>
      <li>
        <router-link to="">
          <i class="far fa-calendar-alt"></i>
          Feriados
        </router-link>
      </li>
      <li>
        <router-link to="/dashboard/ponto">
          <i class="far fa-clock"></i>
          Ponto
        </router-link>
      </li>
      <li>
        <router-link :to="{name: 'home'}" v-if="me.username" class="nav-link">
          <i class="far fa-sign-out-alt"></i>
          <span @click.prevent="logout">Sair</span>
          
        </router-link>  
      </li>
    </ul>
  </nav>
</template>

<script>
  import { mapState, mapActions } from 'vuex'

  export default {
    name: 'Sidebar',

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
  @import url('../assets/css/sidebar.css');
</style>