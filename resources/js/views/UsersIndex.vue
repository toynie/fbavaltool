<template>
    <div class="users">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <ul v-if="users">
            <!-- <li  v-for="{ name, email } in users"> -->
             <li v-for="user in users"  v-bind:key="user">
                <strong>Name:</strong> {{ user.name }},
                <strong>Email:</strong> {{ user.email }}
            </li>
        </ul>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            loading: false,
            users: null,
            error: null,
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
    this.error = this.users = null;
    this.loading = true;
    axios
        .get('/api/users')
        .then(response => {
            this.loading = false;
            console.log(response.data);
            this.users = response.data;
        });
}
    }
}
</script>
