<template>
  <div>

    <div class="text-center">
      <div class="title mb-4">
        Refeitório
      </div>
    </div>

<!-- <button v-on:click="teste()">teste</button> -->

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
          <div class="col-md-2">
            <input name="credencial" v-model="credencial" @change="findCredential" @input="findCredential"  class="form-control" type="text" placeholder="Código da credencial">	
          </div>
        </card>
      </div>
      <div slot="page2">
        <h4>Passo 2</h4>
        <p><h2>Coloque o prato na balança</h2></p>
        <card class="text-center">
         <img src="/images/balanca.png" width="25%" alt="">
          <p><h2>Peso: <b>{{peso}}</b></h2></p>
        </card>
      </div>
      <div slot="page3">
        <h4>Passo 3</h4>
        <p><h2>Confirme as informações</h2></p>
        <p></p>
        <card class="text-center">
            <p><h2>Pessoa: <b>José da Silva</b></h2></p>
            <p><h2>Peso registrado: <b>{{peso}}</b></h2></p>
        </card>
        <div class="text-center">

        </div>
      </div>
      <div slot="page4">
        <h4>Fim</h4>
        <card class="text-center">
         <img src="/images/success.png" width="25%" alt="">
          <p><h2><b>Obrigado!!!</b></h2></p>
        </card>
      </div>
    </vue-good-wizard>


  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Vue from 'vue';
import VueGoodWizard from 'vue-good-wizard';

Vue.use(VueGoodWizard);

export default {
  computed: mapGetters({
    authenticated: 'auth/check'
  }),
  data: () => ({
    title: window.config.appName,
    credencial: null,
    peso: null,
    intervalo: null,
    steps: [
        {
          label: 'Leitura da credencial',
          slot: 'page1',
        },
        {
          label: 'Registro do peso',
          slot: 'page2',
        },
        {
          label: 'Confirmação de dados',
          slot: 'page3',
        },
        {
          label: 'Fim',
          slot: 'page4',
        }
      ]
  }),
  methods: {
    nextClicked(currentPage) {
      console.log('next clicked', currentPage)

      if(currentPage === 0){
        this.startPeso()
      } else {
        this.stopPeso()
      }

      return true; //return false if you want to prevent moving to next page
    },
    backClicked(currentPage) {
      console.log('back clicked', currentPage);
      if(currentPage === 2){
        this.startPeso()
      } else {
        this.stopPeso()
      }
      return true; //return false if you want to prevent moving to previous page
    },
    startPeso () {
      this.intervalo = setInterval(function(){
                this.peso = (Math.random() * (0.00 - 999.99) + 999.99).toFixed(2)
                console.log (this.peso);
            }.bind(this), 500);
    },
    stopPeso () {
      clearInterval(this.intervalo);
    },
    goFirstStep () {
      this.$refs.wizard.currentStep = -1
      this.$refs.wizard.goNext()
    },
    goNextStep () {
      this.$refs.wizard.goNext()
    },
    findCredential () {
      this.goNextStep()
    },
    teste () {
      // console.log(this.$refs.wizard.$el.innerHTML = this.$refs.wizard.$el.innerHTML.replace('Next','Próximo'));
    }
  }
}
</script>

<style scoped>
.title {
  font-size: 70px;
  color: rgb(61, 61, 61);
}

.required:before {
    content: " *";
    color: #f00;
  }
</style>
