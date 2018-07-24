<template>
  <div class="app">
    <AppHeader/>
    <div class="app-body" vcloak>
      <Sidebar :navItems="nav"/>
      <main class="main">
        <!-- <breadcrumb :list="list"/> -->
        <b-container fluid id="f-mainContainer">
          <router-view></router-view>
        </b-container>
      </main>
      <AppAside/>
    </div>
    <!-- <AppFooter/> -->
  </div>
</template>

<script>
// import nav from '../_nav'
// import { Header as AppHeader, Sidebar, Aside as AppAside, Footer as AppFooter, Breadcrumb } from '../components/'
// // import { Header as AppHeader, Sidebar, Footer as AppFooter, Breadcrumb } from '../components/'

export default {
  name: 'full',
  components: {
  },
  data () {
    return {
      nav: nav.items
    }
  },
  computed: {
    name () {
      return this.$route.name
    },
    list () {
      return this.$route.matched
    }
  }
}
</script>
