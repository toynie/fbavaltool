<template>
  <div>
    <p>
      <router-link :to="{ name: 'bussVal' }">Home</router-link>
      <!-- <router-link :to="{ name: 'questions' }">Questions</router-link> | -->
      <!-- <router-link :to="{ name: 'users.index' }">Users</router-link> -->
      <!-- <span v-if="!currentUser">
        <router-link :to="{ name: 'login' }" class="nav-link">Login</router-link>

        <router-link to="/register" class="nav-link">Register</router-link>
      </span>
      <span v-else>
        <a href="#!" @click.prevent="logout" class="dropwdown-item">logout</a>
        |
        {{currentUser.user.name}}
      </span> -->
    </p>

    <!-- <p>{{this.$store.getters.question_answer}}</p> -->


    <div class="container">

      <router-view></router-view>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: false,
      name: "",
      email: "",
      //   buss_types: [],
      questions: [],
      defaultQuestion: "",
      current_qestion: "",
      initialQA:"",
      //   current_answerId:'',
      //   current_answerUserInput:'',
      current_selectedAnswer: [],
      current_set: "",
      sets: [],
      q_a: [],

    };
  },
  created() {
    this.fetchdata();
    // console.log(this.$route);
  },
  mounted() {
    this.$store.dispatch("getBussTypes");
    // this.$store.dispatch("getFreeQuestions");
  },

  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    },
  },
  methods: {
    fetchdata() {
      this.loading = true;
      let vm = this;
      fetch("/api/business-types", {
        method: "post",
        body: JSON.stringify(this.buss_type),
        headers: {
          "content-type": "application/json",
          Authorisation:
            "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImVlMzlkZjVlOTY5NGRkZDU5ZGVhNDMzOWE1OGUyZGYyNDViOTBjMDkxY2Y1ZWIwZTJhYjdlYWE2N2IwODZjMjRiYjU1MzhlZmJmNzNhYWIwIn0.eyJhdWQiOiIxIiwianRpIjoiZWUzOWRmNWU5Njk0ZGRkNTlkZWE0MzM5YTU4ZTJkZjI0NWI5MGMwOTFjZjVlYjBlMmFiN2VhYTY3YjA4NmMyNGJiNTUzOGVmYmY3M2FhYjAiLCJpYXQiOjE1OTk0NjYwNTgsIm5iZiI6MTU5OTQ2NjA1OCwiZXhwIjoxNjMxMDAyMDU3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.28EqrxwoL3u8RTey2KfsKfnV05fleXbLsLrhjWrDXs9uVUn7okrF47bcxMTIcwuO7OnInQGBUCVbb_Aeg8RA_Fw7n09g_Sf-GhXv4tWF65fEx0EFesotnDob2ZjZ3wcfACFHQVhHU3-kIfrEO2TinioTUobAHTJqwYgO9Qf4vu1qnl8NgwuJ4L8ZqKCrP6yoTZuhMyfsdQMWwavGZGNM1yfAYVtj-ZcesHAVfF5fkVDvRM68J4omD_M2F16o72UZul8FTAzilPjntOSYCLJOJD9MyV9iSZTefqQF2plgPbcy_nFCmoMZoRkbWfhOsw7y0SD4wDtKOsp-uU7yu7P77V4dwxEQw1kWF9THqLeGqamCWXAZhZkSEKANDIAAFuURdbTV8uDJs9hF3Rvj2p_WYy-86RFoXfOUPxJHZKEmUVStzdjn8MfJ20TYJQKe2xehpNu9N2WPCI3G5WJInplhsBJqoCCm-2m5DNky1aqqVtC_H0bVxvHK3DOzZw-aZzz26thihkKWBvaNHRnqrEOoQmH9_c2eT8GcMV3JawrKeKuzW3yiCOUiPHB4lCrG41bN7HTjJr0SovHjE3_SBUFqF6COGds2yQsCfe9E-P4zZio0Z6vWo-wRjmUuvkhD8Z_0V8WbNLB4KS3eWIi3R_kh4VMcs_5Lq2giJ4KHYy8Ex5Q",
        },
      }) //url that fetch
        .then((res) => res.json()) // map the response into json
        .then((res) => {
          this.loading = false;
          vm.buss_types = res.buss;
          vm.sets = res.sets;
          vm.questions = res.questions;
          vm.current_set = res.sets[0];
          this.setdefaultQuestion(res.sets[0]);
        })
        .catch((err) => console.log(err)); //
    },

    setdefaultQuestion(param) {
      let tempQuestion = this.questions.filter(function (q) {
        if (q.qset_id == 1) {
          return q;
        }
      })[0];

      this.defaultQuestion = tempQuestion;
    },

    logout() {
      this.$store.commit("logout");
      this.$router.push("/login");
    },
  },
};
</script>
