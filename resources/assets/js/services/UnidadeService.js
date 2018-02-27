import api from "../api";

export default {
  url: "/api/unidade",
  get() {
    if (id) {
      return api.request("get", this.url + id);
    }
  },
  getAll() {
      return api.request("get", this.url);
  }
};
