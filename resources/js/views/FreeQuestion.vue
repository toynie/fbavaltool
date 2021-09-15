<template>
  <div>
    <vue-good-wizard
      :steps="steps"
      :onNext="nextClicked"
      :onBack="backClicked">




    <div slot="page1" v-for="question in this.$store.getters.getQuestions"  :key="question.id" >
        <h4>Step 1</h4>
        <p>This is step 1</p>
      </div>




      <!-- <div slot="page2">
        <h4>Step 2</h4>
        <p>This is step 2</p>
      </div>
      <div slot="page3">
        <h4>Step 3</h4>
        <p>This is step 3</p>
      </div>
      <div slot="page4">
        <h4>Step 4</h4>
        <p>This is step 4</p>
      </div> -->
    </vue-good-wizard>

    <section class="py-5 header">
      <div class="container py-4">
        <form
          @submit.prevent="checkForm"
          ref="qa_form"
          action="/api/addQA"
          method="post"
        >
          <!-- value of name and email -->
          <input
            type="text"
            name="name"
            v-model="name"
            class="form-control"
            hidden
          />
          <input
            type="text"
            name="email"
            v-model="email"
            class="form-control"
            hidden
          />
          <input
            type="text"
            name="selectedBussTypeId"
            v-model="selectedBussTypeId"
            class="form-control"
            hidden
          />
          <input
            type="number"
            v-bind:name="
              this.$store.getters.getInitQuestions['questionId'] + '-1'
            "
            v-bind:value="this.$store.getters.getInitQuestions['answerId']"
            class="form-control"
            hidden
            required
          />

          <!-- value of first question -->
          <!-- <input type="text" v-bind:name="this.$store.getters.getInitQuestions['questionId']"  v-bind:value="this.$store.getters.getInitQuestions['questionId']" class="form-control" placeholder="Enter Name"  /> -->
          <div class="row">
            <div class="col-md-10 offset-md-1">
              {{this.countQuestions}}
              {{this.countSteps}}
              <div
                class="card card-body bg-light p-5 question"
                id="questions-body"
              >
                <div class="question">
                  <div
                    class="mb-4"
                    v-for="question in this.$store.getters.getQuestions"
                    :key="question.id"
                  >

                    <h5 v-bind:title="question.info">
                      <i class="fas fa-info-circle mr-3"></i>
                      <strong>{{ question.id }} -</strong>
                      <strong>"{{ question.name }}"</strong>
                     -- <span>{{getCurrentStep()}}</span>
                    </h5>

                    <div v-if="question.type == 1">
                      <div
                        class="row ml-2 mt-3"
                        v-if="question.typeStyle == '1radio'"
                      >
                        <div
                          class="col-md-6 radio"
                          v-for="answer in question.answers"
                          :key="answer.id"
                        >
                          <label>
                            <input
                              type="radio"
                              checked
                              v-bind:name="question.id + '-' + question.type"
                              v-bind:value="answer.id"
                              v-on:change="
                                addQA(question.id, answer.id, question.type)
                              "
                              required
                            />
                          </label>
                          {{ answer.userInput }}
                        </div>
                      </div>
                      <div
                        class="row mt-3 ml-md-3"
                        v-bind:id="'answerRow-' + question.id"
                        v-else-if="question.typeStyle == '1listBox'"
                      >
                        <div class="form-group ml-md-3">
                          <!-- <label for="sel1">Select list (select one):</label> -->
                          <select
                            class="form-control multiple-answer-select"
                            @change="
                              addQA(
                                question.id,
                                $event.target.value,
                                question.type
                              )
                            "
                            v-bind:name="question.id + '-' + question.type"
                            required
                          >
                            <option value selected disabled>
                              Please select
                            </option>

                            <option
                              v-for="answer in question.answers"
                              :key="answer.id"
                              v-bind:id="question.id + '-' + answer.id"
                              v-bind:value="answer.id"
                              v-on:change="
                                addQA(question.id, answer.id, question.type)
                              "
                            >
                              {{ answer.id }}-{{ answer.userInput }}
                            </option>
                          </select>
                        </div>
                      </div>
                      <div v-else>
                        <div class="row dfbSelectAnser">
                          <div
                            v-for="(answer, index) in question.answers"
                            :key="answer.id"
                            class="col-md-6 custom-control custom-radio my-3"
                          >
                            <div class="row">
                              <div class="col-xs-3">
                                <div
                                  class="bg-success border border-primary border-left-0 border-top-0 border-bottom-0 dfbThickBorder dfbSelectAnser-left justify-content-center align-self-center py-3 px-3"
                                >
                                  {{ String.fromCharCode(abcStart + index) }}
                                </div>
                              </div>
                              <div class="col">
                                <input
                                  type="radio"
                                  v-bind:id="answer.id"
                                  v-bind:name="
                                    question.id + '-' + question.type
                                  "
                                  v-bind:value="answer.id"
                                  class="custom-control-input"
                                  @click="
                                    activeBtn = question.id + '-' + answer.id
                                  "
                                />
                                <label
                                  class="custom-control-label"
                                  style="width: 100%"
                                  v-bind:for="answer.id"
                                >
                                  <div
                                    class="btn btn-default text-left btn-block pl-0"
                                    style="
                                      margin-bottom: 4px;
                                      white-space: normal;
                                    "
                                  >
                                    {{ answer.userInput }}
                                  </div>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="row answer ml-3 pt-2">
                          <div class="input-group mb-3">
                            <div
                              class="btn-group-vertical btn-group-toggle btn-block"
                              data-toggle="buttons"
                            >
                              <label
                                class="btn btn-success text-left"
                                v-for="(answer,index) in question.answers"
                                :key="answer.id"
                                v-bind:id="question.id +'-' +answer.id"
                                v-bind:value="answer.id"
                                v-on:change="addQA(question.id, answer.id, question.type)"
                                :class="{active: activeBtn === question.id +'-' +answer.id }"
                              >
                                <input
                                  type="radio"
                                  v-bind:name="question.id+'-'+question.type"
                                  v-bind:id="answer.id"
                                  autocomplete="off"
                                  v-bind:value="answer.id"
                                  @click="activeBtn = question.id +'-' +answer.id"
                                  required
                                />
                                {{String.fromCharCode(abcStart+index)}}.) &nbsp {{answer.userInput}}
                              </label>
                            </div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div v-else-if="question.type == 2">
                      <div class="row answer ml-sm-3 pt-2">
                        <div class="ml-sm-3">
                          <input
                            class="form-control answer-val"
                            type="number"
                            @input="
                              addQA(
                                question.id,
                                $event.target.value,
                                question.type
                              )
                            "
                            v-bind:name="question.id + '-' + question.type"
                            required
                          />
                          <!-- <input
                          class="form-control answer-val"
                          type="text"
                          placeholder="Default input"
                          />-->
                        </div>
                      </div>
                    </div>
                    <div v-else-if="question.type == 3">
                      <!-- Yes or No -->
                      <div class="row answer ml-md-3 pt-2">
                        <div
                          class="col-md-6"
                          role="group"
                          aria-label="Basic example"
                          v-for="answer in question.answers"
                          :key="answer.id"
                          v-on:click="
                            addQA(question.id, answer.id, question.type)
                          "
                          v-bind:id="question.id + '-' + answer.id"
                        >
                          <!-- <div
                        class="col-md-5 ml-3 answer-yesno answer-multi-text"
                        v-for="answer in question.answers"
                        :key="answer.id"
                        v-on:click="addQA(question.id, answer.id, question.type)"
                        v-bind:id="question.id +'-' +answer.id"
                          >-->

                          <!-- <div class="p-3">
                          <center>{{answer.userInput}}</center>
                          </div>-->
                          <div
                            class="h-5 d-md-none d-md-none d-lg-none d-xl-block"
                          >
                            &nbsp
                          </div>
                          <input
                            class="btn btn-outline-success btn-lg btn-block btnyesno"
                            type="button"
                            v-bind:name="question.id + '-' + question.type"
                            v-bind:value="answer.userInput"
                            required
                          />

                          <!-- <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button> -->
                        </div>
                      </div>
                    </div>
                    <div v-else-if="question.type == 4">
                      <!-- Check -->
                      <div class="row answer ml-3 py-3">
                        <div
                          class="col-md-6 required"
                          v-for="answer in question.answers"
                          :key="answer.id"
                        >
                            <div class="form-group">
                                <label class="control-label col-sm-6" for="email">{{answer.userInput}}</label>
                                <div class="col-sm-6">
                                <input type="number"
                                v-bind:id="question.id + '-' + answer.id"
                                v-bind:name="question.id + '-' + question.type + '[]'"
                                >
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div v-else-if="question.type == 5">

                      <div class="row answer ml-3 py-3">
                        <div
                          class="form-check ml-3 col-md-6 required"
                          v-for="answer in question.answers"
                          :key="answer.id"
                        >
                          <label class="form-check-label">
                            <input
                              type="checkbox"
                              v-bind:id="question.id+'-'+answer.id"
                              class="form-check-input"
                              @input="addCheck(question.id, answer.id, $event.target.checked, question.type)"
                              v-bind:name="question.id+'-'+question.type + '[]'"
                              v-bind:value="answer.id"
                              v-on:click="addCheckBoxArray(question.id,answer.id,$event,question.type)"
                            />
                            {{answer.id}} - {{answer.userInput}}
                          </label>
                        </div>
                        </div>
                    </div>
                    <div v-else>fdf</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 offset-md-1">
              <div class="row px-3 justify-content-between">
                <div class="col-md-4 btn btn btn-primary">Continue Later</div>
                <div class="h-5 d-md-none d-md-none d-lg-none d-xl-block">
                  &nbsp
                </div>
                <input
                  class="col-md-7 btn btn-primary"
                  type="submit"
                  value="Submit"
                />
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

    <div id="collectUserInfo">
      <!-- <button
        class="btn btn-primary m-5"
        type="button"
        @click="showModal = !showModal"
      >Launch demo modal</button> -->
      <!-- Modal-->
      <transition
        @enter="startTransitionModal"
        @after-enter="endTransitionModal"
        @before-leave="endTransitionModal"
        @after-leave="startTransitionModal"
      >
        <div class="modal fade" v-if="showModal" ref="modal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="collectUserInfoLabel">
                  Modal title
                </h5>
                <button
                  class="close"
                  type="button"
                  @click="showModal = !showModal"
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="form-group">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-block" type="button">
                      SELL MY BUSINESS
                    </button>
                    <button class="btn btn-primary btn-block" type="button">
                      JUST CURIOUS
                    </button>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <input
                      type="text"
                      v-model="name"
                      class="form-control"
                      placeholder="Enter Name"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      v-model="email"
                      placeholder="Enter email"
                      name="email"
                    />
                  </div>
                </div>
                <div class="form-group"></div>
              </div>
              <div class="modal-footer">
                <!-- <button class="btn btn-secondary" @click="showModal = !showModal">Close</button> -->

                <div class="form-group">
                  <div class="col-md-12">
                    <button
                      type="submit"
                      class="btn btn-success btn-block"
                      @click="submit_formQA"
                    >
                      KNOW MY BUSINESS' VALUATION
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
      <div class="modal-backdrop fade d-none" ref="backdrop"></div>
    </div>
      <div>

  </div>
  </div>

</template>

<script>
import Vue from 'vue';


import axios from "axios";
import VueGoodWizard from 'vue-good-wizard';
Vue.use(VueGoodWizard);
export default {
  data() {
    return {
      abcStart: 65,
      checkArray: [],
      activeBtn: "",
      activeAnswer: [],
      formValue: {},
      checkSelections: [],
      storeVal: {},
      questions: [],
      showModal: false,
      name: "",
      email: "",
      questionCount: null,
      questionSteps: null,
      questionStepcurrent:1,
      questionIndex: 0,
      selectedBussTypeId:null,
      steps:null,
      test:null,
    //   steps: [
    //     {
    //       label: 'Select Items',
    //       slot: 'page1',
    //     },
    //   ],
    //   steps: [
    //     {
    //       label: 'Select Items',
    //       slot: 'page1',
    //     },
    //     {
    //       label: 'Add Constraints',
    //       slot: 'page2',
    //     },
    //     {
    //       label: 'Review',
    //       slot: 'page3',
    //     },
    //     {
    //       label: 'Apply',
    //       slot: 'page4',
    //     }
    //   ],
    };
  },
  computed: {
    countQuestions(){
        let qLength =this.$store.getters.getQuestions.length;
        this.questionCount =  qLength ;
        return qLength;
    },
    countSteps(){
        let countStep = Math.floor(this.$store.getters.getQuestions.length/4) + ((  (this.$store.getters.getQuestions.length%4!=0)? 1:0));
        this.questionSteps = countStep;
        return countStep ;
    },
    createQuestionStepos(){
        let countStep = Math.floor(this.$store.getters.getQuestions.length/4) + ((  (this.$store.getters.getQuestions.length%4!=0)? 1:0));

        var QuestionSetgap = 4;
        var _countStep = this.countSteps;
        var _steps = [];
        this.test = countStep;
// var i;
//         for (i = 0; i <  7; i++) {
//             // text += cars[i] + "<br>";
//             console.log('oo');
//             _steps.push({
//                 label: 'Select Items sds  ',
//                 slot:  index,
//             });
//         }


var i;
for (i = 0; i < countStep; i++) {
   console.log( countStep);
    _steps.push({
        label: i,
                slot:  i,
    });
}

        this.steps =  _steps ;


    }



  },
  created() {
      this.selectedBussTypeId = this.$store.getters.selectedBussinessType;

    this.createQuestionStepos();

  },
  async mounted() {
    this.$store.dispatch("getFreeQuestions");
    //    this.questionCount = this.countQuestions;
    //   this.questionSteps = this.countSteps;
   this.createQuestionStepos();
  },
  methods: {
    addOneQuestionIndex(){
      // // this.questionIndex = this.questionIndex + 1;
      // this.questionIndex;
      // return;
    },
    getCurrentStep($index){
      // this.questionIndex +=1;
      // this.questionIndex += 1;
      return this.questionIndex + 1;
    },
    addCheckBoxArray(qId, answerId, event, aType) {
      var isChecked = event.target.checked;
      var elementId = qId + "-" + answerId;
      var index = this.checkSelections.findIndex((x) => x.qId == qId);
      let $pushAnswer = null;
      if (index === -1) {
        this.checkSelections.push({
          qId: qId,
          answer: [{ answerId: answerId, value: isChecked }],
          aType: aType,
        });
        $pushAnswer = [{ answerId: answerId, value: isChecked }];
      } else {
        var index2 = this.checkSelections[index].answer.findIndex(
          (x) => x.answerId == answerId
        );
        if (index2 === -1) {
          this.checkSelections[index].answer.push({
            answerId: answerId,
            value: isChecked,
          });
          $pushAnswer = [{ answerId: answerId, value: isChecked }];
        } else {
          this.checkSelections[index].answer.splice(index2, 1);
          console.log("exist already");
        }
      }
    },
    formSubmit(submitEvent) {
      let request = {};
      for (let item in submitEvent.target) {
        if (submitEvent.target.hasOwnProperty(item)) {
          const record = submitEvent.target[item];
          var index = this.checkSelections.findIndex(
            (x) => x.qId == record.name
          );
          if (index === -1) {
            request[record.name] = record.value;
          } else {
            request[record.name] = this.checkSelections[index].answer;
            // alert();
          }
        }
      }
      this.formValue = request;
      this.submitQA(this.$data.formValue);
      console.log(this.formValue);
    },
    submitQA(credentials) {

    //   var formdata = JSON.stringify(credentials);
    //   return new Promise((res, rej) => {
    //     axios
    //       .get("/api/addQA", { params: formdata })
    //       .then((response) => {
    //         res(response);
    //         console.log(response);
    //       })
    //       .catch((err) => {
    //         rej(err);
    //       });
    //   });



  axios.get('/api/addQA',{
      params: formdata,
                // method: 'post',
                // businessType_id:1,
                // this.$store.getters.selectedBussinessType
                // businessType_id:this.state.selectedBusinessType,
                headers:{
                    // "Authorization": `Bearer ${context.state.currentUser.token}`
                    "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjVlNTUzMzdkMmIyYTU5YjI2YmRiYjc5OTM1YzI1ZmFlYmI5YWI1NTYxOWYzZTc3YTk2NzMzMTVmZTViNDRlMWU1NjI4MzYyZGQzZmI0ODkxIn0.eyJhdWQiOiIxIiwianRpIjoiNWU1NTMzN2QyYjJhNTliMjZiZGJiNzk5MzVjMjVmYWViYjlhYjU1NjE5ZjNlNzdhOTY3MzMxNWZlNWI0NGUxZTU2MjgzNjJkZDNmYjQ4OTEiLCJpYXQiOjE2MDI0Mjk5ODMsIm5iZiI6MTYwMjQyOTk4MywiZXhwIjoxNjMzOTY1OTgzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.a3SragasTdWyqcxj82zhdocj7_MIOI9aj855ecorRpZxtsraj0CGlj_k6FEryCK5C_nOToAHQ8iWTIDZTjgD7iAIYeZ-yICS6CJfr3C5HedTmug0xroHS11HokE-_Ke4luOScIwJ9cRQEhDlUU82dUdaSBS0uLpCsnVa9ldnPWH2GksA-TyMkvlcP2yCW5rlpVgmTp3D_QDMe5mMChZH9BrlbYj-a3Qw9SzUHbM7NZEH8ZaDkwfMASX-2N44bAO6cmz6MHh_-vIF6LyovmUAUx-oTleZecwUbacL5EwPHxWT1AWjN_Jummm5Jb4nj98QtNsNiKLRLBaJrjSKy4bBPELN0WL-2Ff5klA_1aMfUh9UcbN2M-EYrfCt60m4bJ5GG_HIdnuBmtSdugw1t-jkoYfOSfjqhR_5xwcRHWiBK3HVP9C3gDIawwbchDaCPGNd2gNZhZKZWmyty7f8mgNt4tZ9QgkhAbFBBfawPXXiYXHctL14KezPbrgm13nc4T9Fxkn4OJQfPNmC8Q28AlwqooPViXSq12YUUU3rDbzPTzy3sGV-c8zH0I47rXfoS4z2qkDvfI06BAOEr8zrd9dXbfsvgI2wvhPvOv-RS6dTLHxhfPkfHBtuCiNEfpbOEl_5aNlaQSkuJOqYRSCbf5_F2upccxfcJr90oKccmG-3Ldw`
                },
            })
            .then((response) => {

                console.log(response);
                // context.commit('fetchFreeQuestions', response.data);
            res(response);

            })









    },
    createActiveAnswer() {
      // console.log(this.$store.getters.getQuestions);
    },
    ifActive(id) {
      if (this.$parent.current_set.id === id) {
        return "nav-link mb-3 p-3 shadow active";
      } else {
        return "nav-link mb-3 p-3 shadow ";
      }
    },
    addQA($questionId, $answer, $answerType) {
      let $qa = [];
      $qa["questionId"] = $questionId;
      $qa["answer"] = $answer;
      $qa["answerType"] = $answerType;
      this.$store.commit("addQA", $qa);
    },
    addCheck($questionId, $answerId, $val, $answerType) {
      // let mainIndex = this.checkArray.findIndex((x) => x.qId == $questionId);
      var index = this.checkArray.findIndex((x) => x.qId == $questionId);
      let $pushAnswer = null;
      if (index === -1) {
        this.checkArray.push({
          qId: $questionId,
          answer: [{ answerId: $answerId, value: $val }],
          aType: $answerType,
        });
        //  alert($questionId);
        $pushAnswer = [{ answerId: $answerId, value: $val }];
      } else {
        var index2 = this.checkArray[index].answer.findIndex(
          (x) => x.answerId == $answerId
        );
        if (index2 === -1) {
          this.checkArray[index].answer.push({
            answerId: $answerId,
            value: $val,
          });
          $pushAnswer = [{ answerId: $answerId, value: $val }];
        } else {
          this.checkArray[index].answer.splice(index2, 1);
          console.log("exist already");
        }
      }
      let $qa = [];
      $qa["questionId"] = $questionId;
      $qa["answer"] = $pushAnswer;
      $qa["answerType"] = $answerType;
      this.$store.commit("addQA", $qa);
    },
    checkForm() {
      this.showModal = true;
    },
    submit_formQA() {
      this.$refs.qa_form.submit();
    },
    startTransitionModal() {
      this.$refs.backdrop.classList.toggle("d-block");
      this.$refs.modal.classList.toggle("d-block");
    },
    endTransitionModal() {
      this.$refs.backdrop.classList.toggle("show");
      this.$refs.modal.classList.toggle("show");
    },
    nextClicked(currentPage) {
      console.log('next clicked', currentPage)
      return true; //return false if you want to prevent moving to next page
    },
    backClicked(currentPage) {
      console.log('back clicked', currentPage);
      return true; //return false if you want to prevent moving to previous page
    }
  },
};
</script>
