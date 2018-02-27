import axios from 'axios'
import config from './config'

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
        let options = { emulateJSON: true };
        onsole.log(this.$http.post(url, data, options))
        return
    }
    return axios({ method, url, data })
  }
}
