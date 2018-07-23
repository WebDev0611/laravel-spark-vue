<template>
  <div class="container-fluid">
    <b-row id="form" >
      <b-col v-show="!hasQuote">
        <b-form class="" method="post">
          <b-row>
            <b-col md="4" sm="12">
              <b-card>
                <div slot="header">
                  <strong>Dimensions</strong>
                </div>
                <b-row>
                  <b-col lg="6" md="12">
                    <b-form-group label="Projection" label-for="projection-feet" description="Feet">
                      <b-input-group>
                        <b-form-input id="projection-feet" type="number" v-model="dimensions.projection.feet"></b-form-input>
                        <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col lg="6" md="12">
                    <b-form-group label="&nbsp;" label-for="projection-inches" description="Inches">
                      <b-input-group>
                        <b-form-input id="projection-inches" type="number" v-model="dimensions.projection.inches"></b-form-input>
                        <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                </b-row>

                <b-row>
                  <b-col lg="6" md="12">
                    <b-form-group label="Width" label-for="width-feet" description="Feet">
                      <b-input-group>
                        <b-form-input id="width-feet" type="number" v-model="dimensions.width.feet"></b-form-input>
                        <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col lg="6" md="12">
                    <b-form-group label="&nbsp;" label-for="width-inches" description="Inches">
                        <b-input-group>
                          <b-form-input id="width-inches" type="number" v-model="dimensions.width.inches"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
                </b-row>

                <b-row>
                  <b-col lg="6" md="12">
                    <b-form-group label="Wall Height" label-for="wall-height-feet" description="Feet">
                      <b-input-group>
                        <b-form-input id="wall-height-feet" type="number" v-model="dimensions.wallHeight.feet"></b-form-input>
                        <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col lg="6" md="12">
                    <b-form-group label="&nbsp;" label-for="wall-height-inches" description="Inches">
                      <b-input-group>
                        <b-form-input id="wall-height-inches" type="number" v-model="dimensions.wallHeight.inches"></b-form-input>
                        <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                </b-row>

                <b-row>
                  <b-col lg="6" md="12">
                    <b-form-group label="Overhang" label-for="overhang-feet" description="Feet">
                        <b-input-group>
                          <b-form-input id="overhang-feet" type="number" v-model="dimensions.overhang.feet"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col lg="6" md="12">
                    <b-form-group label="&nbsp;" label-for="overhang-inches" description="Inches">
                        <b-input-group>
                          <b-form-input id="overhang-inches" type="number" v-model="dimensions.overhang.inches"></b-form-input>
                          <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                        </b-input-group>
                    </b-form-group>
                  </b-col>
                </b-row>

                <b-row>
                  <b-col lg="6" md="12">
                    <b-form-group label="Load (PSF)" label-for="load" description="">
                      <b-input-group>
                        <b-form-input id="load" type="number" v-model="form.load.psf"></b-form-input>
                        <b-input-group class="input-group"></b-input-group>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col lg="6" md="12">
                    <b-form-group label="Wind (MPH)" label-for="wind" description="">
                      <b-input-group>
                        <b-form-input id="wind" type="number" v-model="form.load.mph"></b-form-input>
                        <b-input-group class="input-group"></b-input-group>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                </b-row>
              </b-card>
            </b-col>
            <b-col md="8" sm="12">
              <b-row>
                <b-col md="6" sm="12">
                  <b-card>
                    <div slot="header">
                      <strong>Panel</strong>
                    </div>

                    <b-row>
                      <b-col>

                        <b-form-group label="Panel Type" label-for="panelType" description="">
                          <b-form-select v-model="form.options.panelType" :options="panelOptions" class="mb-3">
                            <template slot="first">
                              <option :value="null" disabled>-- Please select an option --</option>
                            </template>
                          </b-form-select>
                        </b-form-group>

                        <b-form-group label="Number of Posts" label-for="numPosts" description="How many desired? (Optional)">
                          <b-input-group>
                            <b-form-input id="numPosts" type="number" v-model="form.options.numPosts"></b-form-input>
                            <b-input-group class="input-group"></b-input-group>
                          </b-input-group>
                      </b-form-group>

                      </b-col>
                    </b-row>
                  </b-card>

                  <b-card class="mt-5">
                    <div slot="header">
                      <strong>Options</strong>
                    </div>

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

                    <b-row>
                      <b-col>

                        <b-form-group label="Attached To...">
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

<!--                         <b-form-group
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
                        </b-form-group> -->
                      </b-col>
                    </b-row>
                  </b-card>

                </b-col>
                <!-- end Panel Card -->

                <b-col md="6" sm="12">
                  <div slot="header" class="py-4 mb-3">
                    <strong>Force...</strong>
                  </div>

                  <div v-if="form.options.panelType === 0">
                    <b-row>
                      <b-col>
                        <b-form-group label="Insulated Panel Thickness" label-for="panelThickness" description="">
                          <b-form-select v-model="form.options.panelThickness" :options="panelThicknessOptions" class="mb-3">
                            <template slot="first">
                              <option :value="null" disabled>-- Please select an option --</option>
                            </template>
                          </b-form-select>
                        </b-form-group>
                      </b-col>
                    </b-row>
                  </div>
                  <div v-else-if="form.options.panelType === 1">
                    <b-row>
                      <b-col>
                        <b-form-group label="Flat-Pan Thickness" label-for="flatpanThickness" description="">
                          <b-form-select v-model="form.options.flatpanThickness" :options="flatpanThicknessOptions" class="mb-3">
                            <template slot="first">
                              <option :value="null" disabled>-- Please select an option --</option>
                            </template>
                          </b-form-select>
                        </b-form-group>
                      </b-col>
                    </b-row>
                  </div>
                  <div v-else-if="form.options.panelType === 2">
                    <b-row>
                      <b-col>
                        <b-form-group label="W-Pan Thickness" label-for="wpanThickness" description="">
                          <b-form-select v-model="form.options.wpanThickness" :options="wpanThicknessOptions" class="mb-3">
                            <template slot="first">
                              <option :value="null" disabled>-- Please select an option --</option>
                            </template>
                          </b-form-select>
                        </b-form-group>
                      </b-col>
                    </b-row>
                  </div>
                  <div v-else>
                    <p>Please select a panel type</p>
                  </div>

                  <b-row>
                    <b-col>
                      <b-form-group label="Beam Type" label-for="beamType" description="">
                        <b-form-select v-model="form.options.beamType" :options="beamTypeOptions" class="mb-3">
                          <template slot="first">
                            <option :value="null" disabled>-- Please select an option --</option>
                          </template>
                        </b-form-select>
                      </b-form-group>
                    </b-col>
                  </b-row>

                  <b-row>
                    <b-col>
                      <b-form-group label="Post Type" label-for="postType" description="">
                        <b-form-select v-model="form.options.postType" :options="postTypeOptions" class="mb-3">
                          <template slot="first">
                            <option :value="null" disabled>-- Please select an option --</option>
                          </template>
                        </b-form-select>
                      </b-form-group>
                    </b-col>
                  </b-row>

                  <b-row>
                  <b-col lg="6" md="12">
                    <b-form-group label="Post Extension" label-for="buriedPostExtension-feet" description="Feet">
                      <b-input-group>
                        <b-form-input id="buriedPostExtension-feet" type="number" v-model="options.buriedPostExtension.feet"></b-form-input>
                        <b-input-group-addon class="input-group-append"><span class="input-group-text">'</span></b-input-group-addon>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                  <b-col lg="6" md="12">
                    <b-form-group label="&nbsp;" label-for="buriedPostExtension-inches" description="Inches">
                      <b-input-group>
                        <b-form-input id="buriedPostExtension-inches" type="number" v-model="options.buriedPostExtension.inches"></b-form-input>
                        <b-input-group-addon class="input-group-append"><span class="input-group-text">"</span></b-input-group-addon>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                </b-row>

                <b-row>
                  <b-col>
                    <b-form-group label="Number of Beams" label-for="numBeams" description="How many desired? (Optional)">
                      <b-input-group>
                        <b-form-input id="numBeams" type="number" v-model="form.options.numBeams"></b-form-input>
                        <b-input-group class="input-group"></b-input-group>
                      </b-input-group>
                    </b-form-group>
                  </b-col>
                </b-row>

                  <b-row>
                    <b-col>
                      <b-form-checkbox-group stacked id="isFlorida">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="isFlorida1" value="1" v-model="form.options.isFlorida">
                          <label class="custom-control-label" for="isFlorida1">To Florida</label>
                        </div>
                      </b-form-checkbox-group>
                    </b-col>
                  </b-row>

                  <b-row>
                    <b-col>
                      <b-form-checkbox-group stacked id="topOnly">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="topOnly1" value="1" v-model="form.options.topOnly">
                          <label class="custom-control-label" for="topOnly1">Top Only</label>
                        </div>
                      </b-form-checkbox-group>
                    </b-col>
                  </b-row>
                </b-col> 
              </b-row>
            </b-col>
          </b-row>


          <b-row>
            <b-col md="8" sm="12">
              <b-card>
                <div slot="header">
                  <strong>Colors</strong>
                </div>
                <b-row>
                  <b-col lg="6" md="12">
                    <b-form-group>
                      <label for="post-color">Post Color</label>
                      <b-form-select v-model="form.color.post" :options="coloursOptions" class="mb-3">
                        <template slot="first">
                          <option :value="null" disabled>-- Please select an option --</option>
                        </template>
                      </b-form-select>
                    </b-form-group>
                  </b-col>

                  <b-col lg="6" md="12">
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
                  <b-col lg="6" md="12">
                    <b-form-group>
                    <label for="panel-color">Panel Color</label>
                      <b-form-select v-model="form.color.panel" :options="coloursOptions" class="mb-3">
                        <template slot="first">
                          <option :value="null" disabled>-- Please select an option --</option>
                        </template>
                      </b-form-select>
                    </b-form-group>
                  </b-col>

                  <b-col lg="6" md="12">
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
              </b-card>
            </b-col>
            <b-col md="4" sm="12">
              <button type="button" name="button" @click="requestQuote" class="btn btn-success btn-lg btn-block">Submit
                <span v-if="submitBtnLoading"><i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i></span>
              </button>
            </b-col>
          </b-row>
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


    </div>
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
      panelThickness: [
        { id: 0, title: '3' },
        { id: 1, title: '4' },
        { id: 2, title: '6' }
      ],
      wpanThickness: [
        { id: 0, title: '.019' },
        { id: 1, title: '.025' },
        { id: 2, title: '.032' }
      ],
      flatpanThickness: [
        { id: 0, title: '.024' },
        { id: 1, title: '.030' },
        { id: 2, title: '24ga' }
      ],
      beamType: [
        { id: 0, title: '3x3 .078' },
        { id: 1, title: '3x3 .125' },
        { id: 2, title: '4x4' },
        { id: 3, title: '7 inch C beam' },
        { id: 4, title: '7 inch I beam' },
        { id: 5, title: '10 inch C beam' }
      ],
      postType: [
        { id: 0, title: '3x3 .078' },
        { id: 1, title: '3x3 .125' },
        { id: 2, title: '4x4' }
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
      options: {
        buriedPostExtension: {
          feet: 0,
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
          wallAttached: false,
          postAttached: false,
          isFlorida: false,
          topOnly: false,
          panelType: null,
          numBeams: null,
          numPosts: 2,
          buriedPostExtension: null,
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
    },
    panelThicknessOptions () {
      let options = []
      this.panelThickness.forEach(panelThickness => {
        options.push({ value: panelThickness.id, text: panelThickness.title })
      })
      return options
    },
    flatpanThicknessOptions () {
      let options = []
      this.flatpanThickness.forEach(flatpanThickness => {
        options.push({ value: flatpanThickness.id, text: flatpanThickness.title })
      })
      return options
    },
    wpanThicknessOptions () {
      let options = []
      this.wpanThickness.forEach(wpanThickness => {
        options.push({ value: wpanThickness.id, text: wpanThickness.title })
      })
      return options
    },
    postTypeOptions () {
      let options = []
      this.postType.forEach(postType => {
        options.push({ value: postType.id, text: postType.title })
      })
      return options
    },
    beamTypeOptions () {
      let options = []
      this.beamType.forEach(beamType => {
        options.push({ value: beamType.id, text: beamType.title })
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
    getQuotes () {
      axios.get('https://py.rumbolt.ca/quote/api', {
        headers: {
          'Content-Type': 'application/json'
        },
        auth: {
          username: 'marco@fractionl.com',
          password: '18!Infinity33'
        },
        timeout: false,
        params: {}
      }).then(response => {
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
      let options = this.options
      data.dimensions.projection = this.convertToInches(dimensions.projection.feet, dimensions.projection.inches)
      data.options.buriedPostExtension = this.convertToInches(options.buriedPostExtension.feet, options.buriedPostExtension.inches)
      data.dimensions.width = this.convertToInches(dimensions.width.feet, dimensions.width.inches)
      data.dimensions.wallHeight = this.convertToInches(dimensions.wallHeight.feet, dimensions.wallHeight.inches)
      data.dimensions.overhang = this.convertToInches(dimensions.overhang.feet, dimensions.overhang.inches)
      data.load.psf = parseInt(data.load.psf)
      data.load.mph = parseInt(data.load.mph)
      data.options.numPosts = parseInt(data.options.numPosts)
      data.options.numBeams = parseInt(data.options.numBeams)
      data.options.fanBeams = parseInt(data.options.fanBeams)
      axios.post('https://py.rumbolt.ca/quote/api', data, {
        headers: {
          'Content-Type': 'application/json'
        },
        auth: {
          username: 'marco@fractionl.com',
          password: '18!Infinity33'
        },
        timeout: false,
        params: {}
      }).then(response => {
        this.submitBtnLoading = false
        this.getQuotes()
      })
        .catch(errors => {
          this.submitBtnLoading = false
          console.log(errors.message)
        })
    }
  },
  watch: {
    quotes () {
    }
  }
}
</script>