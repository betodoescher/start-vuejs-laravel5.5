<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-12">
      <app-radio label="Qualidade dos alimentos" :selected="form.nut_alimentos" field="nut_alimentos" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Sabor e temperatura" :selected="form.nut_temperatura" field="nut_temperatura" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Entrega das refeições" :selected="form.nut_entrega_refeicao" field="nut_entrega_refeicao" :options="questionario" @setValue="setValueButton" />
    </div>

     <div class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.nut_observacoes" class="form-control" rows="4" id="comment"></textarea>
    </div>

  </div>
</div>
</template>
<script>
import Vue from "vue";
import Form from "vform";
import Radio from "../../global/Radio"

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
      },
      dadosPai: {
          type: Object
      }
  },
  watch: {
    dadosPai: function(param) {
      this.form = Object.assign({}, this.form, param);
    }
  },
  methods: {
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    },
    setValueButton(key, field) {

      switch (field) {
        case "nut_alimentos":
          this.form.nut_alimentos = key.value;
          break;
        case "nut_temperatura":
          this.form.nut_temperatura = key.value;
          break;
        case "nut_entrega_refeicao":
          this.form.nut_entrega_refeicao = key.value;
          break;
      }
    }
  }
};
</script>
