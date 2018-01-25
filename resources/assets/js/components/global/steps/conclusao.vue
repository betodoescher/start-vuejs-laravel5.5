<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-12">
      <b-form-group label="Oferecemos a você um atendimento humanizzado e acolhedor?">
        <b-form-radio-group v-model="form.atendimento_humanizado"
                                :options="questionario"
                                plain
                                />
      </b-form-group>
    </div>

    <div class="form-group col-md-12">
      <b-form-group label="De maneira geral, você está satisfeito com os serviçoes?">
        <b-form-radio-group v-model="form.satisfeito"
                                :options="questionario"
                                plain
                                />
      </b-form-group>
    </div>

    <div class="form-group col-md-12">
      <b-form-group label="Recomendaria nossso hospital a um familiar ou amigo?">
        <b-form-radio-group v-model="form.recomendacao"
                                :options="questionario"
                                plain
                                />
      </b-form-group>
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <b-form-group label="Desde a sua última internação na casa de Saúde São José a mesma se manteve?">
        <b-form-radio-group v-model="form.desde_ultima_visita"
                                :options="questionario"
                                plain
                                />
      </b-form-group>
    </div>

     
  </div>
</div>
</template>
<script>
import Vue from "vue";
import Form from "vform";
import BootstrapVue from "bootstrap-vue";
import { FormRadio } from "bootstrap-vue/es/components";
import { FormGroup } from "bootstrap-vue/es/components";
Vue.use(FormRadio);
Vue.use(FormGroup);

import { questionario } from "../../../services/store/quetionario";

export default {
  name: "app-conclusao",
  data() {
    return {
      questionario,
      form: new Form({
        atendimento_humanizado: null,
        satisfeito: null,
        recomendacao: null,
        desde_ultima_visita: null
      })
    };
  },
  props: {
    tipo: {
      type: Number
    }
  },
  methods: {
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    }
  }
};
</script>
