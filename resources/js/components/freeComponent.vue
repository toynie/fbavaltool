<template>
  <div>
      <h1 class="text-center text-uppercase mt-5">{{defaultQuestion.name}}</h1>
      <h3 class="text-center">{{current_answerId}} <span v-if="current_answerId">.) </span> {{current_answerUserInput}}</h3    >
    <div class="row">

      <div class="col-3 p-5 divbtn" v-for="buss_type in buss_types" v-bind:key="buss_type.id">
            <div  v-on:click="selectBussType(buss_type.id)">
                <img v-if="buss_type.featured" :src="buss_type.featured" :key="pointshover" class="rounded-circle img-fluid img-thumbnail" >
                <!-- <img v-else :src="'//placehold.it/300'" class="rounded-circle img-fluid img-thumbnail" > -->
                <img v-else :src="'/uploads/img/300.png'" class="rounded-circle img-fluid img-thumbnail" >
            </div>

            <br><br>
            <h5 class="text-center">{{buss_type.userInput}}</h5>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email:'',
      buss_types: [],
      questions:[],
      defaultQuestion:'',
      current_qestion:'',
      current_answerId:'',
      current_answerUserInput:'',
      current_set:'',
      sets:[],
      q_a:[]
    };
  },
  created() {
    this.fetchdata();
  },
  computed:{

  },
  methods: {

    fetchdata() {
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
          vm.buss_types = res.buss;
          vm.sets =  res.sets;
          vm.questions =  res.questions;
          vm.current_set = res.sets[0];
          this.setdefaultQuestion(res.sets[0]) ;
        })
        .catch((err) => console.log(err)); //
    },
    setdefaultQuestion(param){

       this.defaultQuestion =  this.questions.filter(
            function(q){
                if(q.qset_id==1){
                    return q;
                }
            }
        )[0];


    },

    selectBussType(id){
        this.current_answerId=id;
        this.current_answerUserInput=this.buss_types[this.current_answerId].userInput
    },

  },
};
</script>
