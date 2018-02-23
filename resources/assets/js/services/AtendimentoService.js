import api from "../api";

export default {
  url: "/api/atendimento/",
  get(id) {
    if (id) {
      return api.request("get", this.url + id);
    }
  }
};
