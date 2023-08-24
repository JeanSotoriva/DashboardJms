require('@/configs/axios')
import { createApp } from 'vue'
import BaseTemplate from '@/layouts/BaseTemplate.vue'
import router from './router'
import store from './store'
import ToastPlugin from '@/plugins/VueToastify';
import PreloaderComponent from '@/components/Preloader.vue'
import GoogleMap from 'vue-google-maps-ui'
import Pagination from 'v-pagination-3';



const app = createApp(BaseTemplate);
app.component('Googlemap', GoogleMap);
app.component('preloader-component', PreloaderComponent);
app.component('pagination', Pagination);
app.use(router);
app.use(store);
app.use(ToastPlugin);
app.mount('#app');

store.dispatch('getMe')