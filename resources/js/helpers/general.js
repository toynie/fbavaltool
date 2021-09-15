
export function initialize(store, router,Axios){


    router.beforeEach((to, from, next)=>{
        const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
        const currentUser = store.state.currentUser;

        if(requiresAuth && !currentUser){

            next('/login');
        } else if(to.path == '/login' && currentUser){
            next('/');
        } else{
            next();
        }
    })

        //If token expires
        Axios.interceptors.response.use (null, (error)=>{
            if(error.response.status ==401){
                store.commit('logout');
                store.push('{name:login}');
            }
        });


}



