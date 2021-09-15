import axios from "axios"

export function login(credentials){
    return new Promise((res, rej)=>{
        axios.post('/api/login',credentials)
            .then((response)=>{
                 res(response.data);
            })
            .catch((err)=>{
                rej("Wrong email or Password");
            })
    });
}

export function getLocalUser() {
    const userStr = localStorage.getItem("user");

    if(!userStr){
        return null;
    }

    return JSON.parse(userStr);
}
