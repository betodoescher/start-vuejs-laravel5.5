import api from "../api";

export default {
  url: "/api/refeicaotipo/",
  get(id) {
    if (id) {
      return api.request("get", this.url + id);
    } else {
      return api.request("get", this.url);
    }
  },
  del(param) {
    return api.request("delete", this.url, param);
  }
};
