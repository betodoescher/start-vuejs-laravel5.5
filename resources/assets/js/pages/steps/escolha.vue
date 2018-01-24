<template>
  <div>
       <div class="row"> 

         <div class="form-group col-md-12">

          <label>Que fatores lhe enfluenciaram na escolha pela Casa de Saúde São José?</label>
          <b-form-checkbox-group plain v-model="form.fator" :options="fatores" />
          <input v-if="buscaFator(6)"  name="qual_empresa" v-model="form.qual_empresa" class="form-control" type="text" placeholder="Qual empresa?">
          <input v-if="buscaFator(7)"  name="outros" v-model="form.outros" class="form-control" type="text" placeholder="Outros quais?">
        </div>
        <div class="form-group col-md-12">
          <label>Você já havia utilizado nossos serviços?</label>
          <select v-model="form.servico" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                <option value="1">Sim</option>
                <option value="2">Não</option>
          </select>
          <input v-if="form.servico == 1"  name="qual_servico" v-model="form.qual_servico" class="form-control" type="text" placeholder="Qual?">
        </div>

         

       </div>
  </div>
</template>
<script>
import Vue from "vue";
import Form from "vform";
import { FormCheckbox } from "bootstrap-vue/es/components";

Vue.use(FormCheckbox);

export default {
  name: "app-escolha",
  data() {
    return {
      fatores: [
        { text: "Proximidade da residência", value: 1 },
        { text: "Familiares", value: 2 },
        { text: "Internet", value: 3 },
        { text: "Médico", value: 4 },
        { text: "Publicidade", value: 5 },
        { text: "Indicação de empresa", value: 6 },
        { text: "Outros", value: 7 }
      ],
      form: new Form({
        fator: []
      })
    };
  },
  methods: {
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    },
    buscaFator(id) {
      for (var key in this.form.fator) {
        if (this.form.fator[key] == id) {
          return true;
          continue;
        }
      }
    }
  }
};
</script>
