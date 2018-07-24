<template>
  <b-container fluid>
    <b-row>
      <b-col>
        <div class="heading">
          <h1>Quote Title</h1>
          <p>ah this is the test</p>
        </div>
      </b-col>
    </b-row>

    <div v-if="quote">
      {{ quote }}
    </div>
  </b-container>
</template>

<script>

  export default {
    data() {
      return {
        quote: []
      }
    },
    methods: {
      getData () {
        let _this = this
        /* global axios */
        axios.get('api/quotes/' + this.$route.params.id).then(function (item) {
          _this.issue = item.data.data
          _this.loading = false
          _this.$emit('loadedData', item.data.data)
        })
      }
    },
    mounted () {
      /* global axios */
      this.getData()
    }
  }
</script>