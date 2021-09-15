<template>

    <div>
        <!-- <p>Hello World!</p>
        <p>{{this.$route.params.questionId}}</p>-->
        <!-- <p>{{this.$parent.q_a}}</p>
        <p>{{this.$parent.current_set}}</p> -->




<section class="py-5 header">
    <div class="container py-4">

        <div class="row">
            <div class="col-md-3">
                <div  class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div v-for="set in this.$parent.sets.slice(1)" v-bind:key="set.id" >

                    <a v-bind:class="ifActive(set.id)" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa fa-calendar-minus-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">{{set.id}}-{{set.name}}</span></a>

                    </div>

                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4 class="font-italic mb-4">Personal information</h4>
                        <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    </div>


</template>


<script>

export default {
  methods: {
      ifActive(id){
          if(this.$parent.current_set.id ===id){
              return "nav-link mb-3 p-3 shadow active";
          }else{
              return "nav-link mb-3 p-3 shadow ";
          }
      }
  }
}
</script>
