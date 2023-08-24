<template>
    <div class="row">
         <SideBar />
        <div class="col-lg-12">
            <div class="row my-4 j1">
                <div>
                    <div >
                        <ColaboradorComponent />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import SideBar from '@/components/SideBar.vue'
import ColaboradorComponent from '@/components/ColaboradorComponent.vue'
import '@/assets/css/auth.css'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

export default {
    components: {
        SideBar,
        ColaboradorComponent
    },
}
</script>