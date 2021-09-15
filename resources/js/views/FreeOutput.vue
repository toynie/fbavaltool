<template>
  <div class="container">
    <div class="row my-3">
      <div
        class="col-md-10  offset-md-1 border border-primary dfbThickBorder p-4"
      >
        <h5>Your business valuation is ...</h5>
        <!-- <center><h1 class="display-4">$158,000 - $182,000</h1></center> -->
        <center><h1 class="display-4">${{qaOutput.valuationRange$[0].toLocaleString('en')}} - ${{qaOutput.valuationRange$[1].toLocaleString('en')}}</h1></center>
        <h5>at 2.5x - 2.8x multiple</h5>
      </div>
    </div>


    <div class="row section valResult">
      <div class="col-md-12">
        <div id="dfbPriceCard" class="d-flex my-4" style="height: 600px">
          <div
            class="p-4 dfbPriceCard-child-left bg-success h-80 flex-fill m-3"
          >
            <div class="h-100" style="position: relative" >
                <center><h3 ><strong>SELL MY BUSINESS FOR ${{qaOutput.valuationRange$[1].toLocaleString('en')}}</strong></h3></center>
              <div class="text-info" >
                  <br>
                <P>

                    <strong>STEP 1</strong><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla

                </P>
                <P>

                    <strong>STEP 2</strong><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla

                </P>
                <P>

                    <strong>STEP 3</strong><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla

                </P>
              </div>
                <center class="w-100" style="position: absolute; bottom: 0">

              <a href="#" class="btn btn-outline-info dfbMediumBorder d-flex justify-content-center d-md-table mx-auto"><strong>SELL MY BUSINESS</strong></a>
                </center>
            </div>
          </div>
          <div
            class="p-4  bg-cyan border border-info dfbThickBorder flex-fill"
          >
            <div class="h-100" style="position: relative" >
                <center><h3 ><strong>INCREASE VALUATION<br>ACCURACY</strong></h3></center>
              <div class="text-primary" >
                  <br>
                 <ul>
                <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla</p>
                </li>

                <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla</p>
                </li>
                <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla</p>
                </li>

            </ul>
              </div>
                <center class="w-100" style="position: absolute; bottom: 0">

              <a href="#" class="btn btn-outline-info dfbMediumBorder  d-flex justify-content-center d-md-table mx-auto"><strong>UPGRADE TO PRO</strong></a>
                </center>
            </div>
          </div>
          <div
            class="p-4 dfbPriceCard-child-right bg-success h-80 flex-fill m-3"
          >
            <div class="h-100" style="position: relative" >
                <center><h3 ><strong>TALK TO A BROKER</strong></h3></center>
              <div class="text-primary" >
                  <br>
                <P>

                    <strong>STEP 1</strong><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla

                </P>
                <P>

                    <strong>STEP 2</strong><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla

                </P>
                <P>

                    <strong>STEP 3</strong><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Minus excepturi veritatis nulla

                </P>
              </div>
                <center class="w-100" style="position: absolute; bottom: 0">

              <a href="#" class="btn btn-outline-info dfbMediumBorder  d-flex justify-content-center d-md-table mx-auto"><strong>TALK TO A BROKER</strong></a>
                </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import VueSpeedometer from "vue-speedometer";
export default {
  components: { VueSpeedometer },
  data() {
    return {
      qaOutput: "",
    };
  },
  created() {
    // console.log(this.$route.query.transactionId);
    setInterval(() => (this.toggle = !this.toggle), 1111);
  },
  mounted() {
    axios
      .post("/api/paid-output-repository", {
        transactionId: this.$route.query.transactionId,
        // businessTypeId: 1,
      })
      .then(
          (response) => {
              (this.qaOutput = response.data);
              console.log(response);
              }
        )
      .catch((error) => {
        this.errorMessage = error.message;
        console.error("There was an error!", error);
      });
  },

  computed: {},
  methods: {},
};
</script>
