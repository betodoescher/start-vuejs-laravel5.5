import api from "../../api";

let url = '/api/usuario/'

let tipo_acessos = [{
        text: "Adminstrador",
        value: '1'
    }, {
        text: "Pesquisa",
        value: '2'
    }, {
        text: "Dashboard",
        value: '3'
    }]

export const state = {
  usersList: {
    data:[],
    per_page:20,
    total:0
  },
  user: []
}
export const mutations = {
  updateUsersList (state, data) {
    state.usersList = data
  },
  updateUserList (state, data) {
    state.user = data
  }
}
export const actions = {
  getUsers (context, param) {

    let urlParam = url
    if(param){
      if(param.page){
        urlParam = url + '?page=' + param.page
      }
      if(param.term){
        urlParam = url + '?likeall=' + param.term
      }
    }
    api.request('get', urlParam).then(response => {

      let store = response.data
      let dados = trataDados(store.data)

      store.data = dados
      context.commit('updateUsersList', store)
    })
  },
  getUser (context, id) {
    api.request('get', url +'/'+ id).then(response => {
      context.commit('updateUserList', response.data)
    })
  },
  deleteUser (context, id) {
    return api.request('delete', url +'/'+ id)
  }
}

function trataDados(dados){

  for (var key in dados) {
      for (var opt in tipo_acessos) {
          if (tipo_acessos[opt].value == dados[key].tipo_usuario) {
              dados[key].tipo_descricao = tipo_acessos[opt].text;
          }
      }
  }

  return dados
}
