import api from "../api";

export default {
  url: "/api/formulario/",
  get(id) {
    if (id) {
      return api.request("get", this.url + id);
    } else {
      return api.request("get", this.url);
    }
  },
  del(id) {
    return api.request("delete", this.url + id);
  },
  post(data) {
    return api.request("post", this.url, data);
  },
  getChart(param) {
    if (param) {
      return api.request("get", this.url + param);
    }
  }
};
