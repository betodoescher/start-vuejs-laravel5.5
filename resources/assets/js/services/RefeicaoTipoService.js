import api from '../api'

export default {
  get (id) {
    if (id) {
      return api.request('get', '/api/refeicaotipo/' + id)
    } else {
      return api.request('get', '/api/refeicaotipo')
    }
  },
  put (dados) {
    return api.request('post', '/api/refeicaotipo/', dados)
  }
}
