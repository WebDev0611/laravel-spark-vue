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
        quotes: []
      }
    },
    methods: {
      /* global axios */
      getData () {
        // axios.defaults.baseURL = 'https://crm.patioconcepts.ca/api/v1/clients';
        // axios.defaults.headers.common['X-Ninja-Token'] = "av9ikrhggsu61zuxesaz0vhhd3rm9c4l";
        // axios.get('https://crm.patioconcepts.ca/api/v1/clients')
        // })
        axios.get('https://crm.patioconcepts.ca/api/v1/clients', {
        params:{
          'X-Ninja-Token': 'av9ikrhggsu61zuxesaz0vhhd3rm9c4l',
        },
        headers: {
          'X-Ninja-Token': 'av9ikrhggsu61zuxesaz0vhhd3rm9c4l',
          // 'Content-Type': 'text/plain',
          // 'Access-Control-Request-Method': 'GET'
          // 'Access-Control-Allow-Origin':'https://crm.patioconcepts.ca',
          // 'X-Requested-With': 'XMLHttpRequest',
          // 'Authorization': 'X-Ninja-Token ' + 'av9ikrhggsu61zuxesaz0vhhd3rm9c4l', 
          // 'withCredentials': 'false',
          // 'crossDomain': 'true',
          // 'Access-Control-Allow-Origin': '*',
          // 'Content-Type': 'application/json',
          // 'Access-Control-Allow-Headers': 'X-Requested-With',
          // 'X-Ninja-Token': 'av9ikrhggsu61zuxesaz0vhhd3rm9c4l'
        },
        }).then(response => {
          console.log(response.data);
          this.clients = response.data
          this.postData()
        }).catch(errors => {
          console.log(errors.message)
        })
      }
    },
    mounted () {
      this.getData()
    }
  }
</script>