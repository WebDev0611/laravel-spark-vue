import Vue from 'vue'
import VueRouter from 'vue-router'

import Quotes from './quotes/List.vue';
Vue.component('quotes', Quotes);

import GenerateQuote from './quotes/Generate.vue';
Vue.component('new-quote', GenerateQuote);

import Clients from './ininja/Clients.vue';
Vue.component('clients', Clients);

Vue.use(VueRouter)

// 1. Define route components.
// const Clients = { template: '<div>Clients</div>' }
// These can be imported from other files
// const Foo = { template: '<div>foo</div>' }
// const Bar = { template: '<div>bar</div>' }

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
  {
    path: '/list',
    name: 'Quote List',
    component: Quotes
  },
  {
    path: '/new-quote',
    name: 'New Quote',
    component: GenerateQuote
  },
  {
    path: '/list',
    name: 'Client List',
    component: Clients
  },
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
  routes, // short for `routes: routes`,
  history: true,
})

export default router;