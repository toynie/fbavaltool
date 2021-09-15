
import UsersIndex from './views/UsersIndex'
import SelectBusinessType from './views/SelectBusinessType'
import Questions from './views/Questions'
// import { login } from './helpers/auth';
// import Login from './components/auth/Login.vue';
import Login from './components/auth/Login.vue';
import Home from './views/Home.vue';
import FreeQuestion from './views/FreeQuestion.vue';
import FreeOutput from './views/FreeOutput.vue';



export const routes = [

    {
        path: '/frontend',
        component: Home,
        // meta: {
        //     requiresAuth: true
        // }
    },

    {
        // path: '/buss-type',
        path: '/frontend/buss-type',
        name: 'bussVal',
        component: SelectBusinessType,
        // meta: {
        //     requiresAuth: true
        // }
    },
    {
        path: '/frontend/questions/',
        name: 'questions',
        component: Questions
    },
    {
        path: '/frontend/free-questions/',
        name: 'freeQuestions',
        component: FreeQuestion
    },
    {
        path: '/frontend/free-output',
        name: 'freeOutput',
        component: FreeOutput,
        // props: route => ({ query: route.query. })
    },
    {
        path: '/frontend/users',
        name: 'users.index',
        component: UsersIndex,
    },
    {
        path: '/frontend/login',
        name: 'login',
        component: Login,
    },

];
