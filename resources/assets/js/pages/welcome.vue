<template>
  <div>
      <app-alert ref="alert" @endCountDown="goFirstStep" :dismissSecs="dismissSecs"></app-alert>
    <vue-good-wizard 
      :steps="steps"
      :onNext="nextClicked" 
      :onBack="backClicked"
      ref="wizard">
      <div slot="page1">
        <h4>Passo 1</h4>
        <p><h2>Efetue a leitura da sua credencial</h2></p>
        <card class="text-center">
          <img src="/images/qrcode.jpg" width="25%" alt="">
          <div class="col-md-4">
            <input name="credencial" v-focus v-model="credencial" @input="findCredential"  class="form-control" type="text" placeholder="Código da credencial">	
          </div>
        </card>
      </div>
      <div slot="page2">
        <h4>Passo 2</h4>
        <p><h2>Colaborador: <b>José da Silva</b></h2></p>
        
        <card class="text-center">
        <p><h2>Coloque o prato na balança</h2></p>
         <img src="/images/balanca.png" width="20%" alt="">
          <p><h2>Peso registrado: <b>{{peso}}</b></h2></p>
          <div class="col-md-4">
            <the-mask v-if="mostrar_peso" :masked="true" v-model="peso" :mask="['#.###', '##.###', '###.###']" name="peso" type="text" class="form-control" placeholder="Infome o peso."/>
          </div>
        </card>
        <card class="text-center">
            <button type="button" class="btn btn-success btn-lg btn-block" @click="enviarRegistro">Finalisar pesagem</button>
        </card>
      </div>
      <div slot="page3">
        <p><h2>Colaborador: <b>José da Silva</b></h2></p>
        <p><h2>Peso registrado: <b>{{peso}}</b></h2></p>
        <card class="text-center">
          <img src="/images/success.png" width="20%" alt="">
          <p><h2><b>Obrigado!!!</b></h2></p>
        </card>
      </div>
    </vue-good-wizard>


  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Vue from "vue";
import VueGoodWizard from "vue-good-wizard";

Vue.use(VueGoodWizard);

export default {
  computed: mapGetters({
    authenticated: "auth/check"
  }),
  data: () => ({
    title: window.config.appName,
    credencial: null,
    peso: null,
    intervalo: null,
    dismissSecs: 5,
    mostrar_peso: false,
    steps: [
      {
        label: "Leitura da credencial",
        slot: "page1"
      },
      {
        label: "Registro do peso",
        slot: "page2"
      },
      {
        label: "Fim",
        slot: "page3"
      }
    ]
  }),
  mounted() {
    // this.$refs.credencial.focus()
    document.getElementsByClassName('clearfix')[0].style.visibility = 'hidden';
  },
  directives: {
    focus: {
      // definição da diretiva
      inserted: function(el) {
        el.focus();
      }
    }
  },
  methods: {
    nextClicked(currentPage) {
      if (currentPage === 0) {
        this.startPeso();
      } else {
        this.stopPeso();
      }

      return true; //return false if you want to prevent moving to next page
    },
    backClicked(currentPage) {
      if (currentPage === 2) {
        this.startPeso();
      } else {
        this.stopPeso();
      }

      if (currentPage === 0) {
        this.$refs.credencial.focus();
      }

      return true; //return false if you want to prevent moving to previous page
    },
    startPeso() {
      this.intervalo = setInterval(
        function() {
          this.peso = (Math.random() * (0.0 - 999.99) + 999.99).toFixed(2);
          console.log(this.peso);
        }.bind(this),
        500
      );
    },
    stopPeso() {
      clearInterval(this.intervalo);
    },
    enviarRegistro() {
      // POST
      this.goNextStep();
      this.$refs["alert"].showAlertSuccess();
    },
    goFirstStep() {
      this.$refs.wizard.currentStep = -1;
      this.$refs.wizard.goNext();
      this.credencial = null;
    },
    goNextStep() {
      this.$refs.wizard.goNext();
    },
    findCredential() {
      this.goNextStep();
    }
  }
};
</script>

<style scoped>
.title {
  font-size: 30px;
  font-weight: bold;
  color: rgb(61, 61, 61);
}

.required:before {
  content: " *";
  color: #f00;
}


</style>
