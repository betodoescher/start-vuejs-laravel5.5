import Vue from "vue";
import moment from "moment";
import VueMomentJS from "vue-momentjs";

Vue.use(VueMomentJS, moment);
export const state = {
  inicio: '01/01/'+moment().format('YYYY'),
  fim: moment().format('YYYY-MM-DD')
}
export const mutations = {
  updateDataInicio (state, data) {
    state.inicio = data
  },
  updateDataFim (state, data) {
    state.fim = data
  }
}
export const actions = {
  setInicio (context, param) {
    context.commit('updateDataInicio', param)
  },
  setFim (context, param) {
    context.commit('updateDataFim', param)
  }
}
