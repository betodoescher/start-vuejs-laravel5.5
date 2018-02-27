import Vue from "vue";
import axios from 'axios'
import config from './config'
Vue.http.options.emulateJSON = true;
export default {
  request (method, uri, data = null) {
    if (!method) {
      console.error('API function call requires method argument')
      return
    }

    if (!uri) {
      console.error('API function call requires uri argument')
      return
    }

    var url = config.serverURI + uri
  console.log(method)
    if(method == 'post'){
      console.log('aki')
        console.log(this.$http.post(url, data))
        return
    }
    return axios({ method, url, data })
  }
}
