<template>
    <div class="row">
        <SideBar />
        <div class="col-lg-12">
                <div class="col-lg-4 col-md-4 col-6 mb-4 restaurant-cards">
                    <h3 class="my-4 title-tenant">Registro de Ponto</h3> 
                    <div>
 
                    </div>
                    <div class="restaurant-card" v-if="colaboradorLogado">
                        <p class="navbar-brand">nome: {{ colaborator.nome }} </p>
                        <p class="navbar-brand">matricula: {{ colaborator.matricula }} </p>
                        <a class="logo" href=""></a>
                        <div class="restaurant-card-body">

                        </div>
                    </div>
                </div>

            <div class="restaurant-cards">
                <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                    <GoogleMap 
                        api-key="AIzaSyDnnG42FvY_dIF2ynd446d8f6mxsDVEIao" 
                        style="width: 100%; height: 300px" :center="center" :zoom="15">
                        <Marker :options="markerOptions" :position="center" />
                    </GoogleMap>
                </div>
                <button class="btn btn-primary" @click="registrarPonto">Registrar Ponto</button>
            </div>
        </div>
    </div>
</template>


<script>
    import '@/assets/css/auth.css'
    import 'bootstrap'
    import 'bootstrap/dist/css/bootstrap.min.css'
    import { GoogleMap, Marker }  from 'vue3-google-map'
    import { URI_BASE_API } from '@/configs/axios'
    import axios from "axios";
    import SideBar from '@/components/SideBar.vue'
    import { mapState, mapActions } from 'vuex'

    export default {

        data() {
            return {
                center: { lat: 0, lng: 0 },
                colaborator: {
                    nome: '',
                    matricula: ''
                }

            }
        },

        mounted() {
            if (this.me.username !== '') {
                this.getColaboradores()
                .catch(_ => {
                    this.$toast.open({
                    message: 'falha ao carregar os colaboradores',
                    type: 'error',
                    duration: '3000',
                    })
                }),
                this.getCurrentLocation();
            }else {
                this.$router.push({ name: 'login' });
            }
        },

        computed: {
            markerOptions() {
                return { position: this.center };
            },
            ...mapState({
                me: state => state.auth.me,
                colaboradores: state => state.colaboradores.colaboradores,
            }),
            colaboradorLogado() {
                const result = this.colaboradores.data.find(colaborador => colaborador.usuario_id === this.me.id);
                // console.log(result);
                if(result){
                    this.colaborator.nome = result.nome;
                    this.colaborator.matricula = result.matricula;
                    return this.colaborator
                }
            },
        },
         
        methods: {
            getCurrentLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                    position => {
                        this.center = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                    },
                    error => {
                        console.error(error.message);
                    }
                    );
                } else {
                    console.error("Geolocalização não é suportada nesse navegador.");
                }
            },
            ...mapActions([
                'getColaboradores'
            ]),
        },

        components: {
            GoogleMap,
            Marker,
            SideBar
        },
    }
</script>