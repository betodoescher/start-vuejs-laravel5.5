<template>
<div>
<div class="row">
     <div class="form-group col-md-12">
      <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
     </div>
  </div>
  <div class="row">

    <div v-if="tipo == 1" class="form-group col-md-12">
      <app-radio label="Central de agendamento" :selected="form.atp_central_agendamento" field="atp_central_agendamento" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Recepcionista" :selected="form.atp_recepcionista" field="atp_recepcionista" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Segurança" :selected="form.atp_seguranca" field="atp_seguranca" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Enfermagem" :selected="form.atp_enfermagem" field="atp_enfermagem" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
      <app-radio label="Equipe médica" :selected="form.atp_equipe_medica" field="atp_equipe_medica" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 3" class="form-group col-md-12">
      <app-radio label="Técnico em imobilização" :selected="form.atp_tec_imobilizacao" field="atp_tec_imobilizacao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 1" class="form-group col-md-12">
      <app-radio label="Téc. Em RX, tomografia, ressonância, laboratório" :selected="form.atp_laboratorio" field="atp_laboratorio" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 1" class="form-group col-md-12">
      <app-radio label="No agendamento foram repassadas todas as orientações sobre preparo e convênio" :selected="form.agendamento_orientacao" field="agendamento_orientacao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.profissionais_observacao" class="form-control" rows="4" id="comment"></textarea>
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
  name: "app-profissionais",
  data() {
    return {
      questionario,
      form: new Form({
        atp_central_agendamento: null,
        atp_recepcionista: null,
        atp_seguranca: null,
        atp_enfermagem: null,
        atp_equipe_medica: null,
        atp_laboratorio: null,
        atp_tec_imobilizacao: null,
        agendamento_orientacao: null,
        profissionais_observacao: null
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
        case "atp_central_agendamento":
          this.form.atp_central_agendamento = key.value;
          break;
        case "atp_recepcionista":
          this.form.atp_recepcionista = key.value;
          break;
        case "atp_seguranca":
          this.form.atp_seguranca = key.value;
          break;
        case "atp_enfermagem":
          this.form.atp_enfermagem = key.value;
          break;
        case "atp_equipe_medica":
          this.form.atp_equipe_medica = key.value;
          break;
        case "atp_laboratorio":
          this.form.atp_laboratorio = key.value;
          break;
        case "atp_tec_imobilizacao":
          this.form.atp_tec_imobilizacao = key.value;
          break;
        case "agendamento_orientacao":
          this.form.agendamento_orientacao = key.value;
          break;
      }
    }
  }
};
</script>
