<template>
  <nav class="sidebar">
    <div class="sidebar-header sidebar-title">
      <!-- <h3>Dashborad</h3> -->
        <li></li><p></p>
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
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'Sidebar',
};
</script>

<style scoped>
  @import url('../assets/css/sidebar.css');
</style>