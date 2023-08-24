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
      <li>
          <!-- <i class="fas fa-user"></i> -->
          <!-- Meu Perfil -->
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
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'Sidebar',
};
</script>

<style>
.sidebar {
  width: 240px;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #333;
  color: #fff;
  overflow-y: auto;
}

.sidebar-header {
  padding: 20px;
  text-align: center;
  background-color: #222;
  font: white;
}

.sidebar-menu {
  list-style-type: none;
  padding: 0;
}

.sidebar-menu li {
  padding: 10px;
  border-bottom: 1px solid #444;
}

.sidebar-menu li:last-child {
  border-bottom: none;
}

.sidebar-menu a {
  text-decoration: none;
  color: #fff;
  display: flex;
  align-items: center;
}

.sidebar-menu i {
  margin-right: 10px;
}

.menu-heading {
  padding: 10px 20px;
  color: #aaa;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.sidebar-title {
  color: white;

}

.logo-image {
  width: 100%;
  align-content: center;
}

</style>
