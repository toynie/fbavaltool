<template>
  <div>
    <!-- <ul id="example-1">
  <li v-for="item in this.$store.getters.bussTypes" :key="item.message">
    {{ item.userInput }}
  </li>
    </ul>-->
    <!-- <p>{{this.$store.getters.bussTypes}}</p> -->
    <h1>{{welcome}}</h1>
    <h1 class="text-center text-uppercase mt-5">{{this.$parent.defaultQuestion.name}}</h1>
    <div class="text-center" v-if="this.$parent.loading">Loading...</div>
    <h3 class="text-center">
      {{this.$parent.current_answerId}}
      <span v-if="this.$parent.current_answerId">.)</span>
      {{this.$parent.current_answerUserInput}}
    </h3>
    <div class="row">
      <div
        class="col-lg-4 col-md-4 col-sm-6 col-xs-6  p-5 divbtn"
        v-for="buss_type in this.$store.getters.bussTypes"
        v-bind:key="buss_type.id"
      >
        <div v-on:click="selectBussType(buss_type.id)">
          <img
            v-if="buss_type.featured"
            :src="'/'+buss_type.featured"
            :key="pointshover"
            v-bind:id="buss_type.id"
            class="rounded-circle img-fluid img-thumbnail img-responsive mx-auto d-block"
            style="max-width:198px; "
          />
          <!-- <img v-else :src="'//placehold.it/300'" class="rounded-circle img-fluid img-thumbnail" > -->
          <img v-else :src="'/uploads/img/300.png'" class="rounded-circle  img-thumbnail " />
        </div>
        <br />
        <br />
        <h5 class="text-center">{{buss_type.name}}</h5>
      </div>
    </div> 
    <div class="row p_businesstypes sec_advisors p-5">

      <div class="col-md-12">
      <div class="row ">
        <div class="col-md-12 text-center">
          <h4> OUR <strong>ADVISORS</strong></h4>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-6">
          <img :src="'/uploads/img/advisor.jpg'" width="100%" alt="placeholder 960" />
        </div>
        <div class="col-md-6">
          <p class="advisor_position">Senior M&A Advisor</p>
          <h4 >KEVIN FINK</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>
      </div>
      </div>

      
     
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    welcome() {
      return this.$store.getters.welcome;
    },
  },
  methods: {
    selectBussType($answerId) {
        // console.log($answerId);

       window.location = '/userdetails?busstype='+$answerId;

      let $qa = [];
      $qa["questionId"] = 1;
      $qa["answerId"] = $answerId;
      this.$store.commit("addQA", $qa);
      this.$store.commit("initialQA", $qa);
      this.$store.commit("selectBusinessType", $answerId);

    //   console.log(this.$store.getters.getInitQuestions);
    //   this.$parent.initialQA=$answerId;
      this.$router.push({ 
        name: "freeQuestions",
      });

      // this.$parent.current_answerId=id;
      // this.$parent.current_answerUserInput=this.$parent.buss_types[this.$parent.current_answerId].userInput

      // if (this.$parent.q_a.some(code => code.question_id === this.$parent.defaultQuestion.id)){
      //     console.log('Already  Existed');
      //     alert('This is already answered');
      // }
      // else{
      //     this.$parent.q_a.push({
      //         question_id: this.$parent.defaultQuestion.id,
      //         answerId: id
      //     });

      //     this.$router.push({
      //         name:'freeQuestions', params: {
      //             questionId:this.$parent.defaultQuestion.id, answerId: id
      //         }
      //     });

      //     this.$parent.current_set= this.$parent.sets[this.$parent.defaultQuestion.id],

      //     console.log('QA added');
      // }
    },
  },
};
</script>
