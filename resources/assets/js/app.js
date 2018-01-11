import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import App from '~/components/App'
import { i18n } from '~/plugins/i18n'

import VeeValidate, { Validator } from 'vee-validate'
import CpfValidator from '../js/validators/cpf.validator'
import Dictionary from '../js/validators/dictionary'
Validator.extend('cpf', CpfValidator)
Vue.use(VeeValidate, {locale: 'pt', dictionary: Dictionary})

import Alert from "./components/global/alert"

import VuejsDialog from "vuejs-dialog"
Vue.use(VuejsDialog)

import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)


import '~/plugins'
import '~/components'

Vue.config.productionTip = false

new Vue({
  i18n,
  store,
  router,
  ...App
})
