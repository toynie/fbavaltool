<template>
  <div class="container">
    <div class="row section valResult">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12 py-5">
            <center>
              <h1 class="align-center">VALUATION <strong>RESULT</strong></h1>
            </center>
          </div>
        </div>

        <div class="row py-5">
          <div class="col-md-6 blueback-radient text-white align-center py-5">
            <center>
              <h3>Your valuation is</h3>
              <h2>
                ${{ qaOutput.valuationRange$[0].toLocaleString("en") }} - ${{
                  qaOutput.valuationRange$[1].toLocaleString("en")
                }}
              </h2>
              <p>
                (  +  ${{ qaOutput.valuationDollar.toLocaleString("en") }} for
                inventory  )
              </p>
              <p>Multiple {{ qaOutput.valMultiplierX }} - 3.44x !!Ask this</p>
            </center>
          </div>
          <div class="col-md-6 py-2 py-3">
            <center>
              <h2>Confidence Level</h2>

              <div class="">
                <vue-speedometer
                  :maxSegmentLabels="12"
                  :maxValue="100"
                  :segments="3"
                  v-bind:value="qaOutput.confidenceScore * 100"
                  :height="180"
                  :segmentColors="['#789bf7', '#7e84f4', '#6fded5']"
                  needleColor="#000080"
                  textColor="${textColor}"
                />
              </div>
              <h5><a href="">What's this?</a></h5>
            </center>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 py-2">
            <center>
              <button type="button" class="btn btn-success btn-lg">
                Sell Your Business for
                {{ qaOutput.valuationRange$[1].toLocaleString("en") }}
              </button>
            </center>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <center>
              <p>We'll help sell your business in 90 days or less!</p>
            </center>
          </div>
        </div>
      </div>
    </div>
    <div class="row section valResult" hidden>
      <div class="col-md-12 blueback py-5 my-5">
        <center>
          <h1 class="">
            VALUATION <strong><b>BREAKDOWN</b></strong>
          </h1>
        </center>
      </div>
    </div>

    <!-- Sell your business Section -->
    <div class="row section valResult mt-5">
      <div class="col-md-12">
        <div class="ro">
          <div class="col-md-12 blueback py-5 my-5">
            <center>
              <h1 class="">
                <strong>SELL</strong> YOUR <strong>BUSINESS</strong>
              </h1>
            </center>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h3 class="py-2">Looking to sell your business?</h3>
            <h3 class="py-2" style="color: #ffdc4a">
              "We'll help you have
              {{ qaOutput.valuationRange$[1].toLocaleString("en") }} in your
              bank account in 90 days"
            </h3>
            <h5 class="py-2">
              We've partnered with Quiet Light Brokerage to offer you a free
              consultation (no-strings-attached) and see if selling is the right
              decision FOR YOU.
            </h5>
            <h5 class="py-2">Here's what you'll cover:</h5>
          </div>
        </div>

        <div class="row my-3">
          <div class="col-md-6">
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.
          </div>
          <div class="col-md-6">
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.
          </div>
        </div>
        <div class="row my-3">
          <div class="col-md-6">
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.
          </div>
          <div class="col-md-6">
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.
          </div>
        </div>
      </div>
    </div>
    <div class="row section valResult mt-5">
      <div class="col-md-12">
        <div class="ro">
          <div class="col-md-12 blueback py-5 my-5">
            <center>
              <h1 class="">
                SCHEDULE A <strong>CALL</strong>
              </h1>
            </center>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h3 class="py-2">Looking to sell your business?</h3>
            <h3 class="py-2" style="color: #ffdc4a">
              "We'll help you have
              {{ qaOutput.valuationRange$[1].toLocaleString("en") }} in your
              bank account in 90 days"
            </h3>
            <h5 class="py-2">
              We've partnered with Quiet Light Brokerage to offer you a free
              consultation (no-strings-attached) and see if selling is the right
              decision FOR YOU.
            </h5>
            <h5 class="py-2">Here's what you'll cover:</h5>
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
      })
      .then((response) => (this.qaOutput = response.data.transactionQAResult))
      .catch((error) => {
        this.errorMessage = error.message;
        console.error("There was an error!", error);
      });
  },

  computed: {},
  methods: {},
};
</script>
