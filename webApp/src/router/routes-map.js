import Login from '@/pages/Auth/Login.vue';
import Dashboard from '@/pages/Dashboard.vue';
import Usuario from '@/pages/Usuario.vue';
import Colaborador from '@/pages/Colaborador.vue';
import Ponto from '@/pages/Ponto.vue';

const routes = [
    {
        path: '/dashboard',
        component: () => import('@/layouts/DefaultTemplate'),
        children: [
            {
                path: '/dashboard/ponto',
                component: Ponto,
                name: 'ponto',
            },
            {
                path: '/dashboard/colaboradores',
                component: Colaborador,
                name: 'colaboradores',
            },
            {
                path: '/dashboard/usuarios',
                component: Usuario,
                name: 'usuarios',
            },
            {
                path: '/dashboard',
                component: Dashboard,
                name: 'dashboard',
            },
        ],
    },
    {
        path: '/',
        children: [
            {
                path: '/login',
                component: Login,
                name: 'login',
            },
            {
                path: '/',
                redirect: '/login',
                name: 'home',
            },
        ]
    }
]

export default routes