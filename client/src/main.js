import { sync } from 'vuex-router-sync'
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import httpPlugin from './plugins/http'
import store from './store'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

Vue.use(httpPlugin, { store, router })

Vue.config.productionTip = false

sync(store, router)

new Vue({
  store,
  router,
  render: h => h(App),
}).$mount('#app')
