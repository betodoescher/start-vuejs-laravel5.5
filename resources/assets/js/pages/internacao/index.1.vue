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

          <div slot="app-atendimento">
            <app-atendimento :tipo="form.tipo_pesquisa" ref="app-atendimento" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-instalacoes">
            <app-instalacoes :tipo="form.tipo_pesquisa" ref="app-instalacoes" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-nutricao">
            <app-nutricao :tipo="form.tipo_pesquisa" ref="app-nutricao" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-equipe">
            <app-equipe :tipo="form.tipo_pesquisa" ref="app-equipe" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-enfermaria">
            <app-enfermaria :tipo="form.tipo_pesquisa" ref="app-enfermaria" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-conclusao">
            <app-conclusao :tipo="form.tipo_pesquisa" ref="app-conclusao" @on-validate="mergePartialModels" />
          </div>

      </vue-good-wizard>

    </form>
  </div>
</template>

<script>
import { mapGetters } from "vuex"
import Vue from "vue"
import VueGoodWizard from "vue-good-wizard"
import Form from "vform"
import Identificacao from "../../components/global/steps/identificacao"
import Escolha from "../../components/global/steps/escolha"
import Atendimento from "../../components/global/steps/atendimento"
import Instalacoes from "../../components/global/steps/instalacoes"
import Nutricao from "../../components/global/steps/nutricao"
import Equipe from "../../components/global/steps/equipe"
import Enfermaria from "../../components/global/steps/enfermaria"
import Conclusao from "../../components/global/steps/conclusao"

Vue.use(VueGoodWizard)

export default {
  computed: mapGetters({
    authenticated: "auth/check"
  }),
  data: () => ({
    dismissSecs: 5,
    form: new Form({
      id: null,
      tipo_pesquisa: 2
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
        label: "Tempo de atendimento",
        slot: "app-atendimento"
      },
      {
        label: "Instalações físicas",
        slot: "app-instalacoes"
      },
      {
        label: "Nutrição",
        slot: "app-nutricao"
      },
      {
        label: "Equipe médica",
        slot: "app-equipe"
      },
      {
        label: "Enfermaria",
        slot: "app-enfermaria"
      },
      {
        label: "Conclusão",
        slot: "app-conclusao"
      }
    ]
  }),
  methods: {
    async validateBeforeSubmit() {
      this.$refs["alert"].showAlertSuccess()
    },
    nextClicked(currentPage) {
      var name = this.$refs["wizard"].currentSlot
      var refToValidate = this.$refs[name]

      return refToValidate.validate()
    },
    mergePartialModels(model, isValid) {
      if (isValid) {
        // merging each step model into the final model
        this.form = Object.assign({}, this.form, model.form)
      }
    },
    backClicked(currentPage) {
      return true
    },
    goFirstStep() {
      this.$refs.wizard.currentStep = -1
      this.$refs.wizard.goNext()
      this.credencial = null
    }
  },
  components: {
    "app-identificacao": Identificacao,
    "app-escolha": Escolha,
    "app-atendimento": Atendimento,
    "app-instalacoes": Instalacoes,
    "app-nutricao": Nutricao,
    "app-equipe": Equipe,
    "app-enfermaria": Enfermaria,
    "app-conclusao": Conclusao
  }
}
</script>
