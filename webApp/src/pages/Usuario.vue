<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="row my-4 j1">
                <div>   
                    <div >
                        <UsuarioComponent/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import UsuarioComponent from '@/components/UsuarioComponent.vue'
import '@/assets/css/auth.css'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

export default {
    components: {
        UsuarioComponent,
    },
}
</script>