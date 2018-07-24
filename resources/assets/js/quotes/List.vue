<template>
  <b-container fluid>
    <b-row>
      <b-col>
        <div class="heading">
          <h1>Quotes</h1>
        </div>
      </b-col>
    </b-row>

    <div v-if="quotes">
      <b-row class="quote-item" v-for="quote in quotes" :key="quote.id">
        <b-col sm="1">{{ quote.id }}</b-col>
        <b-col sm="7">
          <b-link class="item-title" :to="`/quotes/${quote.id}/details`">{{ quote.json.title }}</b-link>
          <div class="quoteMeta">
            <small>
              <i class="fal fa-clock"></i> Created On {{ quote.created_at | moment("dd, MM Do YYYY, h:mm a") }}<br />
              <i class="fal fa-user"></i> Created By ... 
            </small>
          </div>
          <!-- <div class="quoteDescription">
            <p>{{ quote.json.description}}</p>
          </div> -->
        </b-col>
        <b-col sm="2">${{ quote.json.price }}</b-col>
        <b-col sm="2">
          <b-link class="btn btn-outline-primary btn-sm" :to="`/quotes/${quote.id}/details`">View</b-link>
        </b-col>
      </b-row>
    </div>
  </b-container>
</template>

<script>

  export default {
    data() {
      return {
        quotes: []
      }
    },
    methods: {
      /* global axios */
      getData () {
        axios.get('/api/quotes').then(response => {
        this.quotes = response.data
      })
      }
    },
    // mounted () {
    //   /* global axios */
    //   axios.get('api/quotes#/list').then(response => {
    //     this.quotes = response.data.data
    //   })
    // },
    mounted () {
      this.getData()
    }
  }
</script>