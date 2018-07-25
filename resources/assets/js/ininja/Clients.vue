<template>
  <b-container fluid>
    <b-row>
      <b-col>
        <div class="heading">
          <h1>Clients</h1>
          <p>data will go here</p>
          {{ clients }}
        </div>
      </b-col>
    </b-row>

  </b-container>
</template>

<script>

  export default {
    data() {
      return {
        accountData: []
      }
    },
    methods: {
      /* global axios */
      getData () {
        axios.get('/ninja', {
          headers: {
            'Content-Type': 'application/json'
          }
        }).then(response => {
          this.accountData = response.data.data;
          console.log(this.accountData);
        }).catch(error => {
          console.log('Error');
        })
      }
    },
    mounted () {
      this.getData()
    }
  }
</script>