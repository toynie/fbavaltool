// require('./bootstrap')
import Axios from 'axios'
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import {routes} from './routes'
import StoreData from './store'
import {initialize} from './helpers/general'


Vue.use(VueRouter)
Vue.use(Vuex);

const store = new Vuex.Store(StoreData)

import App from './views/App'


const router = new VueRouter({
    mode: 'history',
    routes
});

// intialize store and router
// initialize(store,router);

initialize(store,router,Axios);


const app = new Vue({
    el: '#app',
    store,
    components: { App },
    router,
});
