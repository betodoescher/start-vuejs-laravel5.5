<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-4">
      <b-form-group label="Qualidade dos alimentos">
        <b-form-radio-group v-model="form.nut_alimentos"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-4">
      <b-form-group label="Sabor e temperatura">
        <b-form-radio-group v-model="form.nut_temperatura"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>

    <div class="form-group col-md-4">
      <b-form-group label="Entrega das refeições">
        <b-form-radio-group v-model="form.nut_entrega_refeicao"
                                :options="questionario"
                                plain
                                stacked/>
      </b-form-group>
    </div>
     <div v-if="tipo == 2" class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.nut_observacoes" class="form-control" rows="4" id="comment"></textarea>
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
  name: "app-nutricao",
  data() {
    return {
      questionario,
      form: new Form({
        nut_alimentos: null,
        nut_temperatura: null,
        nut_entrega_refeicao: null,
        nut_observacoes: null
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
