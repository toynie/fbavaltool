// import Axios from "axios";
import {getLocalUser} from "./helpers/auth";
import axios from 'axios'
const user = getLocalUser();

export default {
    state: {
        // welcomeMessage: 'Welcome to my vue app'
        currentUser:user,
        isLoggedIn: !!user,
        loading: false,
        auth_error:null,
        customers: [],
        questions: [],
        question_answer: [],
        is_premium: 0,
        bussTypes: [],
        selectedBusinessType:null,
        initialQA:[],
    },
    getters: {
        // welcome(state){
        //     return state.welcomeMessage;
        // }
        isLoading(state){
            state.loading;
        },
        isLoggedIn(state){
            return state.isLoggedIn;
        },
        currentUser(state){
            return state.currentUser;
        },
        authError(state){
            return state.auth_error;
        },
        customers(state){
            return state.auth_error;
        },
        bussTypes(state){
            return state.bussTypes;
        },
        question_answer(state){
            return state.question_answer;
        },
        getQuestions(state){
            return state.questions;
        },
        getInitQuestions(state){
            return state.initialQA;
        },
        selectedBussinessType(state){
            return state.selectedBusinessType;
        },
    },
    mutations:{
        login(state){
            state.loading = true;
            state.auth_error  = null;

        },
        loginSuccess(state, payload){

            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            // state.currentUser = Object.assign({}, {token: payload.success.token});

            state.currentUser = Object.assign({},{user: {"id":1, "name":"Alex", "email":"ialexies@gmail.com"}}, {token: payload.success.token});

            // localStorage.setItem("user", JSON.stringify(state.currentUser))
            localStorage.setItem("user", JSON.stringify(state.currentUser))
        },
        loginFailed(state,payLoad ){
            state.loading = false;
            state.auth_error = payLoad.error;
        },
        logout(state){
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;
        },
        updateBussTypes(state, payload) {
            state.bussTypes = payload;
        },
        fetchFreeQuestions(state, payload) {
            state.questions = payload;
        },
        initialQA(state,$qa){
            // let qId = $qa['questionId'];
            // let answer =  $qa['answer'];
            // state.initialQA=$qa;
            state.initialQA["questionId"]=$qa["questionId"];
            state.initialQA["answerId"]=$qa["answerId"];
        },
        addQA(state, $qa){

            let qId = $qa['questionId'];
            let answer =  $qa['answer'];
            let aType =  $qa['answerType'];
            let $qaObj = {'qId':$qa['questionId'], 'answer':$qa['answer'], 'aType':$qa['answerType']};

            var index = state.question_answer.findIndex(x => x.qId==qId)

            if (index === -1){
                state.question_answer.push($qaObj);
            }else {
                state.question_answer[index].answer = answer;
                state.question_answer[index].aType= aType;
            }

        },
        selectBusinessType(state, $businessType_id){
            // selectedBusinessType
            state.selectedBusinessType = $businessType_id;
        }
    },

    actions: {
         login(context){
             context.commit("login");

         },
        //  getCustomers(context) {
         getBussTypes(context) {
            axios.post('/api/business-types',{
                headers:{
                    // "Authorization": `Bearer ${context.state.currentUser.token}`
                    "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjVlNTUzMzdkMmIyYTU5YjI2YmRiYjc5OTM1YzI1ZmFlYmI5YWI1NTYxOWYzZTc3YTk2NzMzMTVmZTViNDRlMWU1NjI4MzYyZGQzZmI0ODkxIn0.eyJhdWQiOiIxIiwianRpIjoiNWU1NTMzN2QyYjJhNTliMjZiZGJiNzk5MzVjMjVmYWViYjlhYjU1NjE5ZjNlNzdhOTY3MzMxNWZlNWI0NGUxZTU2MjgzNjJkZDNmYjQ4OTEiLCJpYXQiOjE2MDI0Mjk5ODMsIm5iZiI6MTYwMjQyOTk4MywiZXhwIjoxNjMzOTY1OTgzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.a3SragasTdWyqcxj82zhdocj7_MIOI9aj855ecorRpZxtsraj0CGlj_k6FEryCK5C_nOToAHQ8iWTIDZTjgD7iAIYeZ-yICS6CJfr3C5HedTmug0xroHS11HokE-_Ke4luOScIwJ9cRQEhDlUU82dUdaSBS0uLpCsnVa9ldnPWH2GksA-TyMkvlcP2yCW5rlpVgmTp3D_QDMe5mMChZH9BrlbYj-a3Qw9SzUHbM7NZEH8ZaDkwfMASX-2N44bAO6cmz6MHh_-vIF6LyovmUAUx-oTleZecwUbacL5EwPHxWT1AWjN_Jummm5Jb4nj98QtNsNiKLRLBaJrjSKy4bBPELN0WL-2Ff5klA_1aMfUh9UcbN2M-EYrfCt60m4bJ5GG_HIdnuBmtSdugw1t-jkoYfOSfjqhR_5xwcRHWiBK3HVP9C3gDIawwbchDaCPGNd2gNZhZKZWmyty7f8mgNt4tZ9QgkhAbFBBfawPXXiYXHctL14KezPbrgm13nc4T9Fxkn4OJQfPNmC8Q28AlwqooPViXSq12YUUU3rDbzPTzy3sGV-c8zH0I47rXfoS4z2qkDvfI06BAOEr8zrd9dXbfsvgI2wvhPvOv-RS6dTLHxhfPkfHBtuCiNEfpbOEl_5aNlaQSkuJOqYRSCbf5_F2upccxfcJr90oKccmG-3Ldw`
                }
            })
            .then((response) => {
                context.commit('updateBussTypes', response.data.buss);
                // console.log(response.data.buss);
            })
        },
        getFreeQuestions(context) {
            // console.log('--');
            axios.post('/api/questions-free',{
                // method: 'post',
                // businessType_id:1,
                // this.$store.getters.selectedBussinessType
                businessType_id:this.state.selectedBusinessType,
                headers:{
                    // "Authorization": `Bearer ${context.state.currentUser.token}`
                    "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjVlNTUzMzdkMmIyYTU5YjI2YmRiYjc5OTM1YzI1ZmFlYmI5YWI1NTYxOWYzZTc3YTk2NzMzMTVmZTViNDRlMWU1NjI4MzYyZGQzZmI0ODkxIn0.eyJhdWQiOiIxIiwianRpIjoiNWU1NTMzN2QyYjJhNTliMjZiZGJiNzk5MzVjMjVmYWViYjlhYjU1NjE5ZjNlNzdhOTY3MzMxNWZlNWI0NGUxZTU2MjgzNjJkZDNmYjQ4OTEiLCJpYXQiOjE2MDI0Mjk5ODMsIm5iZiI6MTYwMjQyOTk4MywiZXhwIjoxNjMzOTY1OTgzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.a3SragasTdWyqcxj82zhdocj7_MIOI9aj855ecorRpZxtsraj0CGlj_k6FEryCK5C_nOToAHQ8iWTIDZTjgD7iAIYeZ-yICS6CJfr3C5HedTmug0xroHS11HokE-_Ke4luOScIwJ9cRQEhDlUU82dUdaSBS0uLpCsnVa9ldnPWH2GksA-TyMkvlcP2yCW5rlpVgmTp3D_QDMe5mMChZH9BrlbYj-a3Qw9SzUHbM7NZEH8ZaDkwfMASX-2N44bAO6cmz6MHh_-vIF6LyovmUAUx-oTleZecwUbacL5EwPHxWT1AWjN_Jummm5Jb4nj98QtNsNiKLRLBaJrjSKy4bBPELN0WL-2Ff5klA_1aMfUh9UcbN2M-EYrfCt60m4bJ5GG_HIdnuBmtSdugw1t-jkoYfOSfjqhR_5xwcRHWiBK3HVP9C3gDIawwbchDaCPGNd2gNZhZKZWmyty7f8mgNt4tZ9QgkhAbFBBfawPXXiYXHctL14KezPbrgm13nc4T9Fxkn4OJQfPNmC8Q28AlwqooPViXSq12YUUU3rDbzPTzy3sGV-c8zH0I47rXfoS4z2qkDvfI06BAOEr8zrd9dXbfsvgI2wvhPvOv-RS6dTLHxhfPkfHBtuCiNEfpbOEl_5aNlaQSkuJOqYRSCbf5_F2upccxfcJr90oKccmG-3Ldw`
                },
            })
            .then((response) => {
                console.log('---------');
                // console.log( this.state.selectedBusinessType);
                console.log(this.state.selectedBusinessType);
                console.log(response);
                // console.log(this.$store.getters.bussTypes);
                console.log('---------');
                context.commit('fetchFreeQuestions', response.data);


            })
        },
        // addQA($questionId, $answer){

        //     alert();
        // }
    }
}
