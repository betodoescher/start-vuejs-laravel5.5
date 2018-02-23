import api from "../api";

export default {
  url: "/api/relatorio",
  getChart(param) {
    if (param) {
      return api.request("get", this.url + param);
    }
  },
  get() {
      return api.request("get", this.url);
  }
};
