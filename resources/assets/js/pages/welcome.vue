<template>
  <div>
    <app-alert ref="alert" @endCountDown="goFirstStep" :dismissSecs="dismissSecs"></app-alert>

    <form @submit.prevent="validateBeforeSubmit">

      <!-- <pre>
        {{form}}
      </pre> -->

      <vue-good-wizard 
        :steps="steps"
        :onNext="nextClicked" backClicked
        :onBack="backClicked"
        @stepFinal="validateBeforeSubmit"
        ref="wizard">

          <div slot="app-identificacao">
            <app-identificacao ref="app-identificacao" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-escolha">
            <app-escolha ref="app-escolha" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-profissionais">
            <app-profissionais ref="app-profissionais" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-atendimento">
            <app-atendimento ref="app-atendimento" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-instalacoes">
            <app-instalacoes ref="app-instalacoes" @on-validate="mergePartialModels" />
          </div>

          <div slot="app-conclusao">
            <app-conclusao ref="app-conclusao" @on-validate="mergePartialModels" />
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
import Identificacao from "./steps/identificacao"
import Escolha from "./steps/escolha"
import Profissionais from "./steps/profissionais"
import Atendimento from "./steps/atendimento"
import Instalacoes from "./steps/instalacoes"
import Conclusao from "./steps/conclusao"

Vue.use(VueGoodWizard)

export default {
  computed: mapGetters({
    authenticated: "auth/check"
  }),
  data: () => ({
    dismissSecs: 5,
    form: new Form({
      id: null,
      descricao: "",
      refeicao_classificacao_id: ""
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
      }
    ]
  }),
  methods: {
    async validateBeforeSubmit() {
      console.log(this.form)
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
    "app-profissionais": Profissionais,
    "app-atendimento": Atendimento,
    "app-instalacoes": Instalacoes,
    "app-conclusao": Conclusao
  }
}
</script>
