<template>
  <div>
    <div class="row">
      <div class="form-group col-md-12">
        <h4>Você ficou satisfeito em relação aos itens abaixo?</h4>
      </div>
    </div>

  <div class="row">

    <div v-if="tipo == 1" class="form-group col-md-12">
      <app-radio label="Central de agendamento" :selected="form.ta_central_agendamento" field="ta_central_agendamento" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo != 2" class="form-group col-md-12">
      <app-radio label="Recepção" :selected="form.ta_recepcionista" field="ta_recepcionista" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo != 2" class="form-group col-md-12">
      <app-radio label="Enfermagem" :selected="form.ta_enfermagem" field="ta_enfermagem" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo != 2" class="form-group col-md-12">
      <app-radio label="Equipe médica" :selected="form.ta_equipe_medica" field="ta_equipe_medica" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo == 1" class="form-group col-md-12">
      <app-radio label="Entrega de laudos" :selected="form.ta_entrega_laudo" field="ta_entrega_laudo" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo != 2" class="form-group col-md-12">
      <app-radio label="Administração da medicação" :selected="form.ta_administracao_medicacao" field="ta_administracao_medicacao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo != 2" class="form-group col-md-12">
      <app-radio label="Imobilizações e curativos" :selected="form.ta_imobilizacao_curativo" field="ta_imobilizacao_curativo" :options="questionario" @setValue="setValueButton" />
    </div>

    <!-- <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="Emergência" :selected="form.ta_emergencia" field="ta_emergencia" :options="questionario" @setValue="setValueButton" />
    </div> -->

    <div v-if="tipo == 2" class="form-group col-md-12">
      <app-radio label="O atendimento e o tempo na admissão foram satisfatórios?" :selected="form.ta_internacao" field="ta_internacao" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo != 2" class="form-group col-md-12">
      <app-radio label="Realização de exames laboratoriais" :selected="form.ta_exames" field="ta_exames" :options="questionario" @setValue="setValueButton" />
    </div>

    <div v-if="tipo != 2" class="form-group col-md-12">
      <app-radio label="Realização de exames de imagem" :selected="form.ta_realizacao_exame" field="ta_realizacao_exame" :options="questionario" @setValue="setValueButton" />
    </div>

    <div class="form-group col-md-12">
        <label>Observações</label>
        <textarea v-model="form.atendimento_observacao" class="form-control" rows="4" id="comment"></textarea>
    </div>

  </div>
</div>
</template>
<script>
import Vue from "vue";
import Form from "vform";

import { questionario } from "../../../services/store/quetionario";
import Radio from "../../global/Radio"

export default {
  name: "app-atendimento",
  data() {
    return {
      selected: 1,
      options: [
        { text: "Radio 1", value: "radio1" },
        { text: "Radio 3", value: "radio2" },
        { text: "Radio 3 (disabled)", value: "radio3", disabled: true },
        { text: "Radio 4", value: "radio4" }
      ],
      questionario,
      form: new Form({
        ta_central_agendamento: null,
        ta_recepcionista: null,
        ta_enfermagem: null,
        ta_exames: null,
        ta_entrega_laudo: null,
        ta_equipe_medica: null,
        ta_realizacao_exame: null,
        ta_administracao_medicacao: null,
        ta_imobilizacao_curativo: null,
        ta_emergencia: null,
        ta_internacao: null,
        atendimento_observacao: null
      })
    };
  },
  props: {
      tipo: {
          type: Number
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
    setValueButton(key, field) {

      switch (field) {
        case "ta_central_agendamento":
          this.form.ta_central_agendamento = key.value;
          break;
        case "ta_recepcionista":
          this.form.ta_recepcionista = key.value;
          break;
        case "ta_enfermagem":
          this.form.ta_enfermagem = key.value;
          break;
        case "ta_exames":
          this.form.ta_exames = key.value;
          break;
        case "ta_entrega_laudo":
          this.form.ta_entrega_laudo = key.value;
          break;
        case "ta_equipe_medica":
          this.form.ta_equipe_medica = key.value;
          break;
        case "ta_realizacao_exame":
          this.form.ta_realizacao_exame = key.value;
          break;
        case "ta_administracao_medicacao":
          this.form.ta_administracao_medicacao = key.value;
          break;
        case "ta_imobilizacao_curativo":
          this.form.ta_imobilizacao_curativo = key.value;
          break;
        case "ta_emergencia":
          this.form.ta_emergencia = key.value;
          break;
        case "ta_internacao":
          this.form.ta_internacao = key.value;
          break;
      }
    },
    validate() {
      this.$emit("on-validate", this.$data, true);
      return true;
    }
  }
};
</script>
