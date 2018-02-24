<template>
<div>
  <div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div class="form-group col-md-12">
      <app-radio label="Oferecemos a você um atendimento humanizado e acolhedor?" :selected="form.atendimento_humanizado" field="atendimento_humanizado" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="De maneira geral, você está satisfeito com os serviços?" :selected="form.satisfeito" field="satisfeito" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Recomendaria nosso hospital a um familiar ou amigo?" :selected="form.recomendacao" field="recomendacao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Desde a sua última internação na casa de Saúde São José a mesma se manteve?" :selected="form.desde_ultima_visita" field="desde_ultima_visita" :options="ultima_internacao" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.conclusao_observacao" class="form-control" rows="4" id="comment"></textarea>
    </div>


  </div>
</div>
</template>
<script>
import Vue from "vue";
import Form from "vform";
import Radio from "../../global/Radio"

import { questionario } from "../../../services/store/quetionario";
import { ultima_internacao } from "../../../services/store/ultima_internacao";

export default {
  name: "app-conclusao",
  data() {
    return {
      questionario,
      ultima_internacao,
      form: new Form({
        atendimento_humanizado: null,
        satisfeito: null,
        recomendacao: null,
        desde_ultima_visita: null,
        conclusao_observacao: null
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
        case "atendimento_humanizado":
          this.form.atendimento_humanizado = key.value;
          break;
        case "satisfeito":
          this.form.satisfeito = key.value;
          break;
        case "recomendacao":
          this.form.recomendacao = key.value;
          break;
        case "desde_ultima_visita":
          this.form.desde_ultima_visita = key.value;
          break;
      }
    }
  }
};
</script>
