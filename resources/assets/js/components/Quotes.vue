<template>
  <div class="animated fadeIn">
    <b-row id="form" >
      <b-col v-show="!hasQuote">
        <b-form class="" method="post">
          <b-card>
            <div slot="header">
              <strong>Product Info</strong>
            </div>
            <b-row>
              <b-col md="4" sm="12">
                <b-row>
                  <b-col>
                    <h2>Dimensions</h2>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col>
                    <b-form-group label="Projection" label-for="projection-feet" description="Feet">
                        <b-input-group>
                          <b-form-input id="projection-feet" type="number" v-model="dimensions.projection.feet"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col>
                    <b-form-group label="&nbsp;" label-for="projection-inches" description="Inches">
                        <b-input-group>
                          <b-form-input id="projection-inches" type="number" v-model="dimensions.projection.inches"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-row>
                  <b-col>
                    <b-form-group label="Width" label-for="width-feet" description="Feet">
                        <b-input-group>
                          <b-form-input id="width-feet" type="number" v-model="dimensions.width.feet"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col>
                    <b-form-group label="&nbsp;" label-for="width-inches" description="Inches">
                        <b-input-group>
                          <b-form-input id="width-inches" type="number" v-model="dimensions.width.inches"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-row>
                  <b-col>
                    <b-form-group label="Wall Height" label-for="wall-height-feet" description="Feet">
                        <b-input-group>
                          <b-form-input id="wall-height-feet" type="number" v-model="dimensions.wallHeight.feet"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col>
                    <b-form-group label="&nbsp;" label-for="wall-height-inches" description="Inches">
                        <b-input-group>
                          <b-form-input id="wall-height-inches" type="number" v-model="dimensions.wallHeight.inches"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-row>
                  <b-col>
                    <b-form-group label="Overhang" label-for="overhang-feet" description="Feet">
                        <b-input-group>
                          <b-form-input id="overhang-feet" type="number" v-model="dimensions.overhang.feet"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col>
                    <b-form-group label="&nbsp;" label-for="overhang-inches" description="Inches">
                        <b-input-group>
                          <b-form-input id="overhang-inches" type="number" v-model="dimensions.overhang.inches"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-row>
                  <b-col>
                    <b-form-group label="Load (PSF)" label-for="load" description="">
                        <b-input-group>
                          <b-form-input id="load" type="number" v-model="form.load.psf"></b-form-input>
                          <b-input-group class="input-group"></b-input-group>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col>
                    <b-form-group label="Wind (MPH)" label-for="wind" description="">
                        <b-input-group>
                          <b-form-input id="wind" type="number" v-model="form.load.mph"></b-form-input>
                          <b-input-group class="input-group"></b-input-group>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
            </b-row>
              </b-col>

              <b-col md="4" sm="12">
                <b-row>
                  <b-col>
                    <h2>Colors</h2>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col sm="12">
                    <b-form-group>
                      <label for="post-color">Post Color</label>
                      <b-form-select v-model="form.color.post" :options="coloursOptions" class="mb-3">
                  <template slot="first">
                    <option :value="null" disabled>-- Please select an option --</option>
                  </template>
                </b-form-select>
                    </b-form-group>
                  </b-col>
              </b-row>

              <b-row>
                  <b-col sm="12">
                    <b-form-group>
                      <label for="beam-color">Beam Color</label>
                      <b-form-select v-model="form.color.beam" :options="coloursOptions" class="mb-3">
                  <template slot="first">
                    <option :value="null" disabled>-- Please select an option --</option>
                  </template>
                </b-form-select>
                    </b-form-group>
                  </b-col>
              </b-row>

              <b-row>
                  <b-col sm="12">
                    <b-form-group>
                      <label for="panel-color">Panel Color</label>
                      <b-form-select v-model="form.color.panel" :options="coloursOptions" class="mb-3">
                  <template slot="first">
                    <option :value="null" disabled>-- Please select an option --</option>
                  </template>
                </b-form-select>
                    </b-form-group>
                  </b-col>
              </b-row>

              <b-row>
                  <b-col sm="12">
                    <b-form-group>
                      <label for="fascia-color">Fascia Color</label>
                      <b-form-select v-model="form.color.fascia" :options="coloursOptions" class="mb-3">
                  <template slot="first">
                    <option :value="null" disabled>-- Please select an option --</option>
                  </template>
                </b-form-select>
                    </b-form-group>
                  </b-col>
              </b-row>
              </b-col>

              <b-col md="4" sm="12">
                <b-row>
                  <b-col>
                    <h2>Options</h2>
                  </b-col>
                </b-row>
                <hr />

                <b-row>
                  <b-col>
                    <b-form-group
                      :horizontal="true">
                      <b-form-checkbox-group stacked id="attached">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customChk1" value="1" v-model="form.options.wallAttached">
                          <label class="custom-control-label" for="customChk1">Wall Attached</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customChk2" value="2" v-model="form.options.postAttached">
                          <label class="custom-control-label" for="customChk2">Post Attached</label>
                        </div>
                      </b-form-checkbox-group>
                  </b-form-group>
              </b-col>
          </b-row>

          <b-row>
            <b-col>
                    <b-form-group label="Panel Type" label-for="panelType" description="">
                        <b-form-select v-model="form.options.panelType" :options="panelOptions" class="mb-3">
                          <template slot="first">
                            <option :value="null" disabled>-- Please select an option --</option>
                          </template>
                        </b-form-select>
                    </b-form-group>
                  </b-col>
              </b-row>

          <b-row>
            <b-col>
                    <b-form-group label="Number of Posts" label-for="numPosts" description="How many desired? (Optional)">
                        <b-input-group>
                          <b-form-input id="numPosts" type="number" v-model="form.options.numPosts"></b-form-input>
                          <b-input-group class="input-group"></b-input-group>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
              </b-row>

            <b-row>
              <b-col>
                    <b-form-group label="Fan Beams" label-for="fanbeams" description="How many?">
                        <b-input-group>
                          <b-form-input id="fanbeams" type="number" v-model="form.options.fanBeams"></b-form-input>
                          <b-input-group class="input-group"></b-input-group>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
              </b-row>
              </b-col>
            </b-row>  
            <b-row>
              <b-col>
                <button type="button" name="button" @click="requestQuote" class="btn btn-primary">Submit
                 <span v-if="submitBtnLoading"><i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i></span>
                </button>
              </b-col>
            </b-row>        
          </b-card>
      </b-form>
      </b-col>
    </b-row>


    <!-- <div v-for="quote in quotes">

      {{ quote }}

    </div> -->
    <div v-if="quotes">

      <div v-for="quote in quotes">

        <!-- {{ quote }} -->

       <b-tabs pills card v-if="quote.length > 0 ">
            <b-tab :title="item.title" v-for="item in quote" :key="quote.id">
              <!-- <div v-for="(item, key) in quote" :key="key">
                {{ key }} {{ item.title }}
                <p>#{{ item.id + 1}}: "{{ item.title }}"</p>
                <p>${{ item.price }}</p>
                <p>${{ item.description }}</p>
                <p>{{ item.status }}</p>
              </div> -->
              <b-row>
                <b-col md="4" sm="12">
                  <div v-if="item.title">
                    <h3>#{{ item.id }} {{ item.title }}</h3>
                  </div>
                  <div v-if="item.description">
                    Description: {{ item.description }}
                  </div>
                </b-col>
              </b-row>
              <b-row class="mt-4">
                <b-col md="4" sm="12">
                  <h3>Price</h3>
                  <div v-if="item.price">
                    ${{ item.price }}
                  </div>
                </b-col>
                <b-col md="4" sm="12">              
                  <div v-if="item.status">
                    <h3>Status</h3>
                    <p>{{ item.status }}</p>
                  </div>
                </b-col>
              </b-row>
              <b-row class="mt-3">
                <b-col md="4" sm="12">
                  <div v-if="item.beam">
                    <h3>Beams</h3>
                    <span>
                      <li v-for="(beam, key) in item.beam">
                        {{ key }}: {{ beam }}
                      </li>
                    </span>
                  </div>
                </b-col>
                <b-col md="4" sm="12">
                <div v-if="item.hardware">
                  <h3>Hardware</h3>
                  <span>
                    <li v-for="(hardware, key) in item.hardware">
                      {{ key }}: {{ hardware }}
                    </li>
                  </span>
                </div>
              </b-col>
              <b-col md="4" sm="12">
                <div v-if="item.post">
                  <h3>Post</h3>
                  <span>
                    <li v-for="(post, key) in item.post">
                      {{ key }}: {{ post }}
                    </li>
                  </span>
                </div>
              </b-col>
            </b-row>
            <b-row class="mt-3">
              <b-col md="4" sm="12">
                <div v-if="item.panel">
                  <h3>Panels</h3>
                  <span>
                    <li v-for="(panel, key) in item.panel">
                      {{ key }}: {{ panel }}
                    </li>
                  </span>
                </div>
              </b-col>
              <b-col md="4" sm="12">
                <div v-if="item.fascia">
                  <h3>Fascia</h3>
                  <span>
                    <li v-for="(fascia, key) in item.fascia">
                      {{ key }}: {{ fascia }}
                    </li>
                  </span>
                </div>
              </b-col>
              <b-col md="4" sm="12">
                <div v-if="item.header">
                  <h3>Header</h3>
                  <span>
                    <li v-for="(header, key) in item.header">
                      {{ key }}: {{ header }}
                    </li>
                  </span>
                </div>
                <div v-if="item.gutter" class="mt-3">
                  <h3>Gutter</h3>
                  <span>
                    <li v-for="(gutter, key) in item.gutter">
                      {{ key }}: {{ gutter }}
                    </li>
                  </span>
                </div>
              </b-col>
            </b-row>

            </b-tab>
          </b-tabs>

          

      </div>

        

      <!-- <ul id="v-for-dimensions">
        <li v-for="(value, key) in quote.dimensions" :key="key">
          {{ key }}: {{ convertInches(value) }}
        </li>
      </ul> -->

  </div>



    

    <!-- <b-row>
      <b-col>
        <b-card no-body>
          <b-tabs pills card vertical v-if="quotes.length > 0 ">
            <b-tab :title="quote.title" v-for="quote in quotes" :key="quote.id">
              <b-row>
                  <b-col md="4" sm="12">
                    <b-row>
                      <b-col>
                        <h2>Dimensions</h2>
                        <hr />
                        <ul id="v-for-dimensions">
                          <li v-for="(value, key) in quote.dimensions" :key="key">
                            {{ key }}: {{ convertInches(value) }}
                          </li>
                        </ul>
                  <br />
                      </b-col>
                    </b-row>
                    <b-row class="mt-4">
                      <b-col>
                        <h2>Load</h2>
                        <hr />
                        <ul id="v-for-load">
                    <li v-for="(value, key) in quote.load" :key="key">
                      {{ key }}: {{ value }}
                    </li>
                  </ul>
                      </b-col>
                    </b-row>
                  </b-col>
                  <b-col md="4" sm="12">
                    <b-row>
                      <b-col>
                        <h2>Details</h2>
                        <hr />
                        <ul>
                    <li>Panel Type: {{ quote.panelType }}"</li>
                    <li># of Posts: {{ quote.numPost }}</li>
                    <li># of Fan Beams: {{ quote.options.fanBeams }}</li>
                    <li>Zip: {{ quote.zip }}</li>
                  </ul>
                      </b-col>
                    </b-row>
                    <b-row class="mt-4">
                      <b-col>
                        <h2>Colors</h2>
                        <hr />
                        <ul id="v-for-colors">
                    <li v-for="(value, key) in quote.color" :key="key">
                      {{ key }}: {{ colours[value].title}}
                    </li>
                  </ul>
                      </b-col>
                    </b-row>
                  </b-col>
                  <b-col md="4" sm="12">
                    <b-row>
                      <b-col>
                        <h2>Options</h2>
                        <hr />
                        <div>
                          <input type="checkbox" v-model="quote.options.wallAttached" disabled>
                          <label>Wall Attached</label>
                        </div>
                        <div>
                          <input type="checkbox" v-model="quote.options.postAttached" disabled>
                          <label>Post Attached</label>
                        </div>
                      </b-col>
                    </b-row>		            	
                  </b-col>
              </b-row>
            </b-tab>
          </b-tabs>
      </b-card>
    </b-col>
  </b-row> -->
   </div>
</template>


<script>

export default {
  /* global axios */
  name: 'quote',
  data () {
    return {
      test: '',
      hasQuote: '',
      submitBtnLoading: false,
      colours: [
        { id: 0, title: 'White' },
        { id: 1, title: 'Dark Bronze' },
        { id: 2, title: 'Ivory' },
        { id: 3, title: 'Clay' }
      ],
      panels: [
        { id: 0, title: 'Insulated' },
        { id: 1, title: 'Flat Pan ' },
        { id: 2, title: 'W-Pan' }
      ],
      quotes: [],
      dimensions: {
        projection: {
          feet: 13,
          inches: 0
        },
        width: {
          feet: 28,
          inches: 0
        },
        wallHeight: {
          feet: 10,
          inches: 0
        },
        overhang: {
          feet: 1,
          inches: 0
        }
      },
      form: {
        dimensions: {
          projection: 0,
          width: 0,
          wallHeight: 0,
          overhang: 0
        },
        load: {
          psf: 10,
          mph: 20
        },
        color: {
          post: 0,
          beam: 0,
          panel: 0,
          fascia: 0
        },
        options: {
          wallAttached: true,
          postAttached: true,
          panelType: 0,
          numPosts: 2,
          fanBeams: 0
        }
      }
    }
  },
  computed: {
    coloursOptions () {
      let options = []
      this.colours.forEach(color => {
        options.push({ value: color.id, text: color.title })
      })
      return options
    },
    panelOptions () {
      let options = []
      this.panels.forEach(panel => {
        options.push({ value: panel.id, text: panel.title })
      })
      return options
    }
  },
  methods: {
    convertInches (inches) {
      let feetFromInches = Math.floor(parseInt(inches) / 12)
      let inchesRemainder = inches % 12
      return feetFromInches + '\' ' + inchesRemainder + '\'\''
    },
    convertToInches (feet, inches) {
      return parseInt(feet) * 12 + parseInt(inches)
    },
    // getQuotes () {
    //   axios.get('https://py.rumbolt.ca/quote/api?api-key=your_api_key').then(response => {
    //     this.quotes = response.data
    //     this.updateQuotes()
    //     this.hasQuote = true
    //   })
    // },
    getQuotes () {
      axios({
        method:'get',
        url:'https://py.rumbolt.ca',
        auth: {
          username: 'marco@fractionl.com',
          password: '18!Infinity33'
          }
      })
      .then(response => {
        this.quotes = response.data
        this.updateQuotes()
        this.hasQuote = true
      })
    },
    updateQuotes: function () {
      this.$nextTick(function () {
        console.log(this.$el.textContent) // => 'updated'
      })
    },
    requestQuote () {
      this.submitBtnLoading = true
      let data = this.form
      let dimensions = this.dimensions
      data.dimensions.projection = this.convertToInches(dimensions.projection.feet, dimensions.projection.inches)
      data.dimensions.width = this.convertToInches(dimensions.width.feet, dimensions.width.inches)
      data.dimensions.wallHeight = this.convertToInches(dimensions.wallHeight.feet, dimensions.wallHeight.inches)
      data.dimensions.overhang = this.convertToInches(dimensions.overhang.feet, dimensions.overhang.inches)
      data.load.psf = parseInt(data.load.psf)
      data.load.mph = parseInt(data.load.mph)
      data.options.numPosts = parseInt(data.options.numPosts)
      data.options.fanBeams = parseInt(data.options.fanBeams)
      axios({
        method:'post',
        url:'https://py.rumbolt.ca',
        auth: {
          username: 'marco@fractionl.com',
          password: '18!Infinity33'
          }
      })
      .then(response => {
        this.submitBtnLoading = false
        this.getQuotes()
      })
        .catch(errors => {
          this.submitBtnLoading = false
          console.log(errors.message)
        })
    }
    // getQuotes () {
    //   return axios('/quote/api', {
    //     method: 'POST',
    //     mode: 'no-cors',
    //     headers: {
    //       Accept: 'application/json',
    //       'Content-Type': 'application/json'
    //     },
    //     withCredentials: true,
    //     credentials: 'same-origin'
    //   }).then(response => {
    //   })
    // },
    // requestQuote () {
    //   this.submitBtnLoading = true
    //   let data = this.form
    //   let dimensions = this.dimensions
    //   data.dimensions.projection = this.convertToInches(dimensions.projection.feet, dimensions.projection.inches)
    //   data.dimensions.width = this.convertToInches(dimensions.width.feet, dimensions.width.inches)
    //   data.dimensions.wallHeight = this.convertToInches(dimensions.wallHeight.feet, dimensions.wallHeight.inches)
    //   data.dimensions.overhang = this.convertToInches(dimensions.overhang.feet, dimensions.overhang.inches)
    //   data.load.psf = parseInt(data.load.psf)
    //   data.load.mph = parseInt(data.load.mph)
    //   data.options.numPosts = parseInt(data.options.numPosts)
    //   data.options.fanBeams = parseInt(data.options.fanBeams)
    //   axios.post('/quote/api', data).then(response => {
    //     this.submitBtnLoading = false
    //     this.getQuotes()
    //   })
    //     .catch(errors => {
    //       this.submitBtnLoading = false
    //       console.log(errors.message)
    //     })
    // }
  },
  watch: {
    quotes () {
    }
  }
}
</script>