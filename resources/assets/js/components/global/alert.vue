<template>
  <div>
    <!-- <b-alert show>Default Alert</b-alert>

    <b-alert variant="success" show>Success Alert</b-alert>

    <b-alert variant="danger"
             dismissible
             :show="showDismissibleAlert"
             @dismissed="showDismissibleAlert=false">
      Dismissible Alert!
    </b-alert> -->

    <b-alert :show="dismissCountDown"
             dismissible
             :variant="tipo"
             @dismissed="dismissCountDown=0"
             @dismiss-count-down="countDownChanged">
      <!-- <p>{{msg}} This alert will dismiss after {{dismissCountDown}} seconds...</p> -->
      <p>{{msg}}</p>
      <b-progress :variant="tipo"
                  :max="dismissSecs"
                  :value="dismissCountDown"
                  height="4px">
      </b-progress>
    </b-alert>

    <!-- <b-btn @click="showAlert" variant="info" class="m-1">
      Show alert with count-down timer
    </b-btn> -->
    <!-- <b-btn @click="showDismissibleAlert=true" variant="info" class="m-1">
      Show dismissible alert ({{showDismissibleAlert?'visible':'hidden'}})
    </b-btn> -->
  </div>
</template>

<script>
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import { Alert } from 'bootstrap-vue/es/components';
import { Button } from 'bootstrap-vue/es/components';
import { Progress } from 'bootstrap-vue/es/components';
Vue.use(Alert);
Vue.use(Button);
Vue.use(Progress);

export default {
  name: 'app-alert',
  data () {
    return {
      // dismissSecs: 10,
      dismissCountDown: 0,
      showDismissibleAlert: false,
      msg: '',
      tipo: 'warning'
    }
  },
  props: {
    dismissSecs: {
      type: Number,
      default: 10
    }
  },
  methods: {
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
      if (dismissCountDown === 0) {
        this.$emit("endCountDown")
      }
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
    showAlertSuccess () {
      this.tipo = 'success'
      this.msg = 'Registro salvo com sucesso.'
      this.dismissCountDown = this.dismissSecs
    },
    showAlertError () {
      this.tipo = 'error'
      this.msg = 'Ocorreu um erro!'
      this.dismissCountDown = this.dismissSecs
    },
    showAlertInfo (msg) {
      this.tipo = 'info'
      this.msg = msg
      this.dismissCountDown = this.dismissSecs
    },
    showAlertWarning (msg) {
      this.msg = msg
      this.dismissCountDown = this.dismissSecs
    },
    showAlertDelete () {
      this.tipo = 'success'
      this.msg = 'Registro excluido com sucesso.'
      this.dismissCountDown = this.dismissSecs
    }
  }
}
</script>
