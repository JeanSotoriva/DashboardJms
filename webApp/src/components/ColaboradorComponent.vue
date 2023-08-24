<template>
  <div>
    <h2>Lista de Colaboradores</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Matricula</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
      <tbody>
        <tr  v-for="(colaborador, index) in colaboradores.data" :key="index">
          <td>{{ colaborador.matricula }}</td>
          <td>{{ colaborador.nome }}</td>
          <td>{{ colaborador.email }}</td>
          <td>{{ colaborador.telefone }}</td>
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
    import { mapActions, mapMutations, mapState } from 'vuex'
    import Pagination from 'v-pagination-3';
    import '@/assets/css/auth.css'
    import 'bootstrap'
    import 'bootstrap/dist/css/bootstrap.min.css'

export default {
  name: 'ColaboradorComponent',

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

  mounted(){
    this.getColaboradores()
      .catch(_ => {
        this.$toast.open({
          message: 'falha ao carregar os colaboradores',
          type: 'error',
          duration: '3000',
        })
    })
  },

  computed: {
    ...mapState({
      colaboradores: state => state.colaboradores.colaboradores,
      me: state => state.auth.me
    }),
  },

  methods: {
      ...mapActions([
        'getColaboradores'
      ]),
  },

  components: {
    Pagination,
  },
  
}
</script>