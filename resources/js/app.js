import { createApp } from 'vue';
import App from './src/App.vue';

import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

const vuetify = createVuetify({
    ssr: true,
    components,
    directives,
  })
  
createApp(App).use(vuetify).mount('#app')
