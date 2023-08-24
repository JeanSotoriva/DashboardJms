<template>
  <div>
    <h2>Lista de Usuários</h2>

    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>Nome</th>
          <th>Role</th>
          <th>editar</th>
          <th>deletar</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(usuario, index) in usuarios.data" :key="index">
          <td>{{ usuario.id }}</td>
          <td>{{ usuario.username }}</td>
          <td>{{ usuario.role }}</td>
          <td>
            <button @click="editUser(usuario.id)" class="edit-button">
              <i class="fas fa-edit"></i>
            </button>
          </td>
          <td>
            <button @click="deleteUser(usuario.id)" class="delete-button">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <Pagination
      v-model="page"
      :records="20"     
      :per-page="10"  
      @paginate="handlePagination"
    />
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';  
import Pagination from 'v-pagination-3';

export default {
  name: 'UsuarioComponent',

  data() {
    return {
      page: 1,
      perPage: 10,
    };
  },

  created() {
    if (this.me.username === '') {
        return this.$router.push({name: 'home'})
    }
  },

  mounted() {
    this.getUsuarios()
      .catch(_ => {
        this.$toast.open({
          message: 'falha ao carregar os usuarios',
          type: 'error',
          duration: '3000',
        })
    });
  },

  computed: {
    ...mapState({
      usuarios: state => state.usuarios.usuarios,
      me: state => state.auth.me
    }),  
  },

  methods: {
    ...mapActions([
      'getUsuarios'
    ]),
    editUser(userId) {

    },
    deleteUser(userId) {
 
    },
  },

  components: {
    Pagination
  },

};
</script>

<style scooped>
.logo {
  max-width: 35px; 
  max-height: 35px;
}
</style>