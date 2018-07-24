<template>
  <b-container fluid>
    <b-form id="qgf" v-show="!hasQuote" class="" method="post">
      <b-row class="mb-5 pb-5">
        <b-col class="mb-5 pb-5">
          <div v-if="errors.length" class="alert alert-danger" role="alert">
            <b>Please correct the following error(s):</b>
            <ul>
              <li v-for="error in errors">{{ error }}</li>
            </ul>
          </div>
        <div class="card border-light mb-5">
          <div class="card-header">Required</div>
            <div class="card-body">
              <b-row class="mt-3 align-items-center">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Projection</h5>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-form-group>
                    <small class="d-none d-md-block">Feet</small>
                    <b-input-group>
                      <b-form-input id="projection-feet" type="number" v-model="dimensions.projection.feet"></b-form-input>
                    </b-input-group>
                  </b-form-group>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-form-group>
                    <small class="d-none d-md-block">Inches</small>
                    <b-input-group>
                      <b-form-input id="projection-inches" type="number" v-model="dimensions.projection.inches"></b-form-input>
                    </b-input-group>
                  </b-form-group>
                </b-col>
              </b-row>

              <b-row class="align-items-center mt-2">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Width</h5>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-input-group>
                    <b-form-input id="width-feet" type="number" v-model="dimensions.width.feet"></b-form-input>
                  </b-input-group>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                    <b-input-group>
                      <b-form-input id="width-inches" type="number" v-model="dimensions.width.inches"></b-form-input>
                    </b-input-group>
                </b-col>
              </b-row>

              <b-row class="align-items-center mt-2">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Wall Height</h5>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-input-group>
                    <b-form-input id="wall-height-feet" type="number" v-model="dimensions.wallHeight.feet"></b-form-input>
                  </b-input-group>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-input-group>
                    <b-form-input id="wall-height-inches" type="number" v-model="dimensions.wallHeight.inches"></b-form-input>
                  </b-input-group>
                </b-col>
              </b-row>

              <b-row class="align-items-center mt-2">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Overhang</h5>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                    <b-input-group>
                      <b-form-input id="overhang-feet" type="number" v-model="dimensions.overhang.feet"></b-form-input>
                    </b-input-group>
                    <small class="d-block d-md-none">Feet</small>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                    <b-input-group>
                      <b-form-input id="overhang-inches" type="number" v-model="dimensions.overhang.inches"></b-form-input>
                    </b-input-group>
                    <small class="d-block d-md-none">Inches</small>
                </b-col>
              </b-row>

              <b-row class="align-items-center mt-4">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Load (PSF)</h5>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-input-group>
                    <b-form-input id="load" type="number" v-model="form.load.psf"></b-form-input>
                  </b-input-group>
                </b-col>
              </b-row>

              <b-row class="align-items-center mt-2">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Wind (MPH)</h5>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-input-group>
                    <b-form-input id="wind" type="number" v-model="form.load.mph"></b-form-input>
                  </b-input-group>
                </b-col>
              </b-row>

              <b-row class="mt-4 align-items-center">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Type:</h5>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-button-group>
                    <b-button v-on:click="setWallAttached" @click="activeBtn2 = 'btn1'" :class="{active: activeBtn2 === 'btn1' }">Wall Attached</b-button>
                    <b-button v-on:click="unsetWallAttached" @click="activeBtn2 = 'btn2'" :class="{active: activeBtn2 === 'btn2' }">Free Standing</b-button>
                  </b-button-group>
                </b-col>
              </b-row>

              <b-row class="mt-4 align-items-center">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Posts:</h5>
                </b-col>
                <b-col lg="3" sm="4" cols="6">
                  <b-button-group>
                    <b-button v-on:click="setPostAttached" @click="activeBtn3 = 'btn1'" :class="{active: activeBtn3 === 'btn1' }">Attached</b-button>
                    <b-button v-on:click="unsetPostAttached" @click="activeBtn3 = 'btn2'" :class="{active: activeBtn3 === 'btn2' }">Buried</b-button>
                  </b-button-group>
                </b-col>
              </b-row>

              <b-row class="mt-4 align-items-center">
                <b-col lg="2" md="3" cols="12">
                  <h5 class="card-title">Panel Type</h5>
                </b-col>
                <b-col lg="3" md="4" sm="12">
                  <b-button-group>
                    <b-button v-on:click="setInsulated" @click="activeBtn1 = 'btn1'" :class="{active: activeBtn1 === 'btn1' }">Insulated</b-button>
                    <b-button v-on:click="setFlatPan" @click="activeBtn1 = 'btn2'" :class="{active: activeBtn1 === 'btn2' }">Flat Pan</b-button>
                    <b-button v-on:click="setWPan" @click="activeBtn1 = 'btn3'" :class="{active: activeBtn1 === 'btn3' }">W Pan</b-button>
                  </b-button-group>
                </b-col>
              </b-row>

              

                <div v-if="form.options.panelType === 0">
                  <b-row class="mt-2 align-items-center">
                    <b-col lg="2" md="3" cols="12">
                      <h5 class="card-title">Force Thickness</h5>
                    </b-col>
                    <b-col lg="3" md="4" sm="12">
                      <b-form-select v-model="form.options.panelThickness" :options="panelThicknessOptions">
                        <template slot="first">
                          <option :value="null" disabled>-- Please select an option --</option>
                        </template>
                      </b-form-select>
                    </b-col>
                  </b-row>
                </div>
                

                <div v-else-if="form.options.panelType === 1">
                  <b-row class="mt-2 align-items-center">
                    <b-col lg="2" md="3" cols="12">
                      <h5 class="card-title">Force Thickness</h5>
                    </b-col>
                    <b-col lg="3" md="4" sm="12">
                      <b-form-select v-model="form.options.flatpanThickness" :options="flatpanThicknessOptions">
                        <template slot="first">
                          <option :value="null" disabled>-- Please select an option --</option>
                        </template>
                      </b-form-select>
                    </b-col>
                  </b-row>
                </div>

                <div v-else-if="form.options.panelType === 2">
                  <b-row class="mt-2 align-items-center">
                    <b-col lg="2" md="3" cols="12">
                      <h5 class="card-title">Force Thickness</h5>
                    </b-col>
                    <b-col lg="3" md="4" sm="12">
                      <b-form-select v-model="form.options.wpanThickness" :options="wpanThicknessOptions">
                        <template slot="first">
                          <option :value="null" disabled>-- Please select an option --</option>
                        </template>
                      </b-form-select>
                    </b-col>
                  </b-row>
                </div>

                <div v-else>
                  <b-row class="mt-2 align-items-center">
                    <b-col lg="2" md="3" cols="12">
                      <h5 class="card-title">&nbsp;</h5>
                    </b-col>
                    <b-col lg="3" md="4" sm="12">
                      <p>Please select a panel type</p>
                    </b-col>
                  </b-row>
                </div>

            </div>
          </div>
          <!--start main row #2 -->
          <b-row>
            <!--start options card -->
            <b-col md="6" sm="12">
              <div class="card border-light mb-5">
                <div class="card-header">Options</div>
                <div class="card-body">
                  <b-row>
                    <b-col lg="6" md="12">
                      <b-form-group label="Number of Posts" label-for="numPosts" description="How many desired? (Optional)">
                          <b-input-group>
                            <b-form-input id="numPosts" type="number" v-model="form.options.numPosts"></b-form-input>
                            <b-input-group class="input-group"></b-input-group>
                          </b-input-group>
                      </b-form-group>
                    </b-col>
                    <b-col lg="6" md="12">
                      <b-form-group label="Fan Beams" label-for="fanbeams" description="How many?">
                          <b-input-group>
                            <b-form-input id="fanbeams" type="number" v-model="form.options.fanBeams"></b-form-input>
                            <b-input-group class="input-group"></b-input-group>
                          </b-input-group>
                      </b-form-group>
                    </b-col>
                  </b-row>

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


                </div>
              </div>
            </b-col>
            <!--start Overrides -->
            <b-col md="6" sm="12">
              <div class="card border-light mb-5">
                <div class="card-header">Overrides</div>
                <div class="card-body">
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
                </div>
              </div>
            </b-col>
          </b-row>

          <b-row class="fixedSubmit">
            <b-col md="4" sm="12">
              <button type="button" name="button" @click="checkForm(); requestQuote()" class="btn btn-success btn-lg">Submit
                <span v-if="submitBtnLoading"><i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i></span>
              </button>
              <a class="btn btn-danger btn-lg" href="#" @click="saveQuote()">Get Data</a>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
    </b-form>
        



    <!-- <div v-for="quote in quotes">

      {{ quote }}

    </div> -->
    <div v-if="quotes">

      <div v-for="quote in quotes">

        <!-- {{ quote }} -->

        <b-tabs id="quoteResults" pills card v-if="quote.length > 0 ">

          <b-tab :title="item.title" v-for="item in quote" :key="quote.id">
            <!-- <div v-for="(item, key) in quote" :key="key">
              {{ key }} {{ item.title }}
              <p>#{{ item.id + 1}}: "{{ item.title }}"</p>
              <p>${{ item.price }}</p>
              <p>${{ item.description }}</p>
              <p>{{ item.status }}</p>
            </div> -->
              <b-row class="mb-5 pb-5">
                <b-col md="5" sm="12">
                  <b-row>
                    <b-col>
                      <div v-if="item.title">
                        <h2 class="title">#{{ item.id }} {{ item.title }}</h2>
                      </div>
                      <div v-if="item.description">
                        Description: {{ item.description }}
                      </div>
                    </b-col>
                  </b-row>

                  <b-row class="mt-4">
                    <b-col>
                      <h4>Price</h4>
                      <div v-if="item.price">
                        ${{ item.price }}
                      </div>
                    </b-col>
                  </b-row>
                  <b-row class="mt-4">
                    <b-col>              
                      <div v-if="item.status">
                        <h4>Status</h4>
                        <p>{{ item.status }}</p>
                      </div>
                    </b-col>
                  </b-row>
                </b-col>
                <b-col md="7" sm="12">
                <div v-if="item.param" class="grey-bg">
                  <h4 class="mb-3">Quote Parameters</h4>
                  <b-row>
                    <b-col>
                      <h5>Dimensions</h5>
                      <ul class="results">
                        <li v-for="(param, key) in item.param.dimensions" :key="item.param.dimensions.id">
                          {{ key }}: {{ param }}
                        </li>
                      </ul>
                    </b-col>
                    <b-col>
                      <h5>Load</h5>
                      <ul class="results">
                        <li v-for="(param, key) in item.param.load">
                          {{ key }}: {{ param }}
                        </li>
                      </ul>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col>
                      <h5>Options</h5>
                      <ul class="results">
                        <li v-for="(param, key) in item.param.options">
                          {{ key }}: {{ param }}
                        </li>
                      </ul>
                    </b-col>
                    <b-col>
                      <h5>Colour</h5>
                      <ul class="results">
                        <li v-for="(param, key) in item.param.color">
                          {{ key }}: {{ param }}
                        </li>
                      </ul>
                    </b-col>
                  </b-row>
                </div>
              </b-col>
            </b-row>

              <b-row class="mt-3">
                <b-col lg="4" md="6" sm="6">
                  <div v-if="item.beam">
                    <h4>Beams</h4>
                    <b-list-group>
                      <b-list-group-item v-for="(beam, key) in item.beam" :key="item.beam.id">
                        {{ key }}: {{ beam }}
                      </b-list-group-item>
                    </b-list-group>
                  </div>
                </b-col>

                <b-col lg="4" md="6" sm="6">
                  <div v-if="item.post">
                    <h4>Post</h4>
                    <b-list-group>
                      <b-list-group-item v-for="(post, key) in item.post" :key="item.post.id">
                        {{ key }}: {{ post }}
                      </b-list-group-item>
                    </b-list-group>
                  </div>
                  <div v-if="item.header">
                    <h4 class="mt-4">Header</h4>
                    <b-list-group>
                      <b-list-group-item v-for="(header, key) in item.header" :key="item.header.id">
                        {{ key }}: {{ header }}
                      </b-list-group-item>
                    </b-list-group>
                  </div>
                </b-col>

                <b-col lg="4" md="6" sm="6">
                  <div v-if="item.panel">
                    <h4>Panels</h4>
                    <b-list-group>
                      <b-list-group-item v-for="(panel, key) in item.panel" :key="item.panel.id">
                        {{ key }}: {{ panel }}
                      </b-list-group-item>
                    </b-list-group>
                  </div>
                  <div v-if="item.hardware">
                    <h4 class="mt-4">Hardware</h4>
                    <b-list-group>
                      <b-list-group-item v-for="(hardware, key) in item.hardware" :key="item.hardware.id">
                        {{ key }}: {{ hardware }}
                      </b-list-group-item>
                    </b-list-group>
                  </div>
                </b-col>
              </b-row>

              <b-row class="my-5 pb-5">

                <b-col lg="4" md="6" sm="6">
                  <div v-if="item.fascia">
                    <h4>Fascia</h4>
                    <b-list-group>
                      <b-list-group-item v-for="(fascia, key) in item.fascia" :key="item.fascia.id">
                        {{ key }}: {{ fascia }}
                      </b-list-group-item>
                    </b-list-group>
                  </div>
                </b-col>

                <b-col lg="4" md="6" sm="6">
                  <div v-if="item.gutter">
                    <h4>Gutter</h4>
                    <b-list-group>
                      <b-list-group-item v-for="(gutter, key) in item.gutter" :key="item.gutter.id">
                        {{ key }}: {{ gutter }}
                      </b-list-group-item>
                    </b-list-group>
                  </div>
                </b-col>
              </b-row>
            </b-col>
          </b-row>
        </b-tab>
    </b-tabs>

    <b-row class="fixedSubmit">
      <b-col>
        <a class="btn btn-success btn-lg" href="#" @click="saveQuote()">Save Quote</a>
        <a class="btn btn-danger btn-lg" href="/quotes">Cancel & Start Over</a>
      </b-col>
    </b-row>

          

      </div>
    </div>
  </b-container>
</template>

<script>

export default {
  /* global axios */
  name: 'quote',
  data () {
    return {
      test: '',
      errors: [],
      hasQuote: '',
      submitBtnLoading: false,
      activeBtn1:'',
      activeBtn2:'btn1',
      activeBtn3:'btn1',
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
          wallAttached: true,
          postAttached: true,
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
    checkForm: function (e) {
      if (this.panelType && this.dimensions.projection.feet && this.dimensions.width.feet && this.dimensions.wallHeight.feet && this.dimensions.overhang.feet) {
        return true;
      }

      this.errors = [];

      if (!this.panelType) {
        this.errors.push('Panel Type required.');
      }
      if (!this.dimensions.projection.feet) {
        this.errors.push('Projection Required.');
      }
      if (!this.dimensions.width.feet) {
        this.errors.push('Width Required.');
      }
      if (!this.dimensions.wallHeight.feet) {
        this.errors.push('Wall Height Required.');
      }
      if (!this.dimensions.overhang.feet) {
        this.errors.push('Overhang Required.');
      }
      window.scrollTo(0, top);
      e.preventDefault();
    },
    setInsulated: function () {
      this.panelType = '0'
      this.form.options.panelType = 0
    },
    setFlatPan: function () {
      this.panelType = '1'
      this.form.options.panelType = 1
    },
    setWPan: function () {
      this.panelType = '2'
      this.form.options.panelType = 2
    },
    setWallAttached: function (e) {
      this.wallAttached = true
      this.form.options.wallAttached = true
      e.preventDefault();
      // alert('data ' + this.wallAttached + 'form ' + this.form.options.wallAttached)
    },
    setPostAttached: function (e) {
      this.postAttached = true
      this.form.options.postAttached = true
      e.preventDefault();
    },
    unsetWallAttached: function (e) {
      this.wallAttached = false
      this.form.options.wallAttached = false
      e.preventDefault();
    },
    unsetPostAttached: function (e) {
      this.postAttached = false
      this.form.options.postAttached = false
      e.preventDefault();
    },
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
    saveQuote () {
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
        this.postData()
        this.hasQuote = true
      })
    },
    updateQuotes: function () {
      this.$nextTick(function () {
        console.log(this.$el.textContent) // => 'updated'
      })
    },
    postData () {
      // how do we post the data to the DB?
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