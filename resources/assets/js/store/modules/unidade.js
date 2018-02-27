import api from "../../api";

let url = '/api/unidade'

export const state = {
  unidades: {}
}
export const mutations = {
  updateList (state, data) {
    state.unidades = data
  }
}
export const actions = {
  getAll (context) {
    api.request('get', url).then(response => {
      context.commit('updateList', trataDados(response.data.data))
    })
  }
}

function trataDados(dados){
  for (var key in dados) {
    dados[key].value = dados[key].cd_unid_int
    dados[key].text = dados[key].ds_unid_int
  }

  return dados
}
