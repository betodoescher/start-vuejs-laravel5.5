import api from '../api'

export default {
  url: '/api/usuario/',
  get (id, page) {
    if (id) {
      return api.request('get', this.url + id)
    }

    if (page) {
      return api.request('get', this.url + '?page=' + page)
    }

    return api.request('get', this.url + '?per_page=10')
  },
  del (id) {
    return api.request('delete', this.url + id)
  },
  post (data) {
    return api.request('post', this.url, data)
  }
}
