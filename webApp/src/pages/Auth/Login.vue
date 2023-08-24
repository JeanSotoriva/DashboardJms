<template>
    <div class="d-flex justify-content-center h-100 my-5">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <router-link :to="{name: 'dashboard'}"><img src="@/assets/imgs/login-logo.png" class="brand_logo centered-container" alt="Logo"></router-link>
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form @submit.prevent="auth">

                    <div class="text-danger" v-if="errors.username != ''">
                        {{ errors.username[0] || '' }}
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="username" v-model="formData.username" name="username"  placeholder="Username"
                        :class="['form-control', 'input_user', {'is-invalid': errors.username != ''}]">
                    </div>

                    <div class="text-danger" v-if="errors.password != ''">
                        {{ errors.password[0] || '' }}
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" v-model="formData.password" name="password"  placeholder="Senha"
                        :class="['form-control', 'input_user', {'is-invalid': errors.password != ''}]">
                    </div>
                     <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="button" class="btn login_btn"
                            :disabled="loading">
                            <span v-if="loading">Entrando...</span>
                            <span v-else>Entrar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import '@/assets/css/auth.css'
    import { mapActions } from 'vuex'

export default {

    data() {
        return {
            loading: false,

            formData: {
                username: '',
                password: '',
            },

            errors: {
                username: '',
                password: '',
            }
        }
    },


    methods: {
        ...mapActions([
            'login'
        ]),

        auth () {
            this.resetErros()
            this.loading = true

            const params = {
                ...this.formData
            }

            this.login(params)
                .then(response => {
                    this.$toast.open({
                        message: 'Autenticação realizada com sucesso',
                        type: 'success',
                        duration: '3000',
                    })
                    this.$router.push({name: 'dashboard'})
                })
                .catch(error => {
                    const errorResponse = error.response
                    if (error.response && error.response.status === 422) {
                        this.errors = Object.assign(this.errors, errorResponse.data.errors)
                        this.$toast.open({
                            message: 'Dados inválidos, verifique novamente',
                            type: 'error',
                            duration: '3000',
                        });
                        return;
                    }
                    this.$toast.open({
                        message: 'Falha ao Autenticar',
                        type: 'error',
                        duration: '3000',
                    });
                })
                .finally(() => this.loading = false)
            },

            resetErros () {
            this.errors = {
                username: '',
                password: '',
            }
        }
    },
}

</script>