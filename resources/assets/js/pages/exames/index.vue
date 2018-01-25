<template>
  <div>
    <app-alert ref="alert" @endCountDown="goFirstStep" :dismissSecs="dismissSecs"></app-alert>
    <form @submit.prevent="validateBeforeSubmit">
      <vue-good-wizard 
        :steps="steps"
        :onNext="nextClicked" backClicked
        :onBack="backClicked"
        @stepFinal="validateBeforeSubmit"
        ref="wizard">

          <div slot="app-identificacao">
              <app-identificacao :tipo="form.tipo_pesquisa" ref="app-identificacao" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-escolha">
            <app-escolha :tipo="form.tipo_pesquisa" ref="app-escolha" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-profissionais">
            <app-profissionais :tipo="form.tipo_pesquisa" ref="app-profissionais" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-atendimento">
            <app-atendimento :tipo="form.tipo_pesquisa" ref="app-atendimento" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-instalacoes">
            <app-instalacoes :tipo="form.tipo_pesquisa" ref="app-instalacoes" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-conclusao">
            <app-conclusao :tipo="form.tipo_pesquisa" ref="app-conclusao" @on-validate="mergePartialModels" />
          </div>

          <div slot="fim">
             <card class="text-center">
              <img src="/images/success.png" width="15%" alt="">
              <p><h2><b>Obrigado!!!</b></h2></p>
            </card>
          </div>

      </vue-good-wizard>
    </form>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Vue from "vue";

import VueGoodWizard from "vue-good-wizard";
Vue.use(VueGoodWizard);

import Form from "vform";
import Identificacao from "../../components/global/steps/identificacao";
import Escolha from "../../components/global/steps/escolha";
import Profissionais from "../../components/global/steps/profissionais";
import Atendimento from "../../components/global/steps/atendimento";
import Instalacoes from "../../components/global/steps/instalacoes";
import Conclusao from "../../components/global/steps/conclusao";

import Service from "../../services/FormularioService";

export default {
  computed: mapGetters({
    authenticated: "auth/check"
  }),
  data: () => ({
    dismissSecs: 5,
    form: new Form({
      tipo_pesquisa: 1
    }),
    steps: [
      {
        label: "Informações adicionais",
        slot: "app-identificacao"
      },
      {
        label: "Sua escolha",
        slot: "app-escolha"
      },
      {
        label: "Atenção e interesse dos profissionais",
        slot: "app-profissionais"
      },
      {
        label: "Tempo de atendimento",
        slot: "app-atendimento"
      },
      {
        label: "Instalações físicas",
        slot: "app-instalacoes"
      },
      {
        label: "Conclusão",
        slot: "app-conclusao"
      },
      {
        label: "Fim",
        slot: "fim"
      }
    ]
  }),
  methods: {
    async validateBeforeSubmit() {
      Service.post(this.form)
        .then(response => {
          this.$refs["alert"].showAlertSuccess();
          this.form.reset();
        })
        .catch(e => {
          console.log(e);
          this.$refs["alert"].showAlertErrorMsg("Erro ao salvar formulário!");
        });
    },
    created () {
      alert('aki')
    }, 
    nextClicked(currentPage) {
      if (this.$refs["wizard"].currentSlot) {
        var name = this.$refs["wizard"].currentSlot;
        var refToValidate = this.$refs[name];
        return refToValidate.validate();
      } else {
        return true;
      }
    },
    backClicked(currentPage) {
      return true;
    },
    mergePartialModels(model, isValid) {
      if (isValid) {
        this.form = Object.assign({}, this.form, model.form);
      }
    },
    goFirstStep() {
      this.$refs.wizard.currentStep = -1;
      this.$refs.wizard.goNext();
    }
  },
  components: {
    "app-identificacao": Identificacao,
    "app-escolha": Escolha,
    "app-profissionais": Profissionais,
    "app-atendimento": Atendimento,
    "app-instalacoes": Instalacoes,
    "app-conclusao": Conclusao
  }
};
</script>
