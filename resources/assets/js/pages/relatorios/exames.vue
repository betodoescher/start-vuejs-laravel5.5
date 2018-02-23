<template>
  <div>
    <card v-if="mostrar" title="Dados da pesquisa selecionada">
      <app-identificacao ref="app-identificacao" tipo="1" :dadosPai="pesquisa"></app-identificacao>
      <app-escolha ref="app-escolha" tipo="1" :dadosPai="pesquisa"></app-escolha>
      <app-profissionais ref="app-profissionais" tipo="1" :dadosPai="pesquisa"></app-profissionais>
      <app-atendimento ref="app-atendimento" tipo="1" :dadosPai="pesquisa"></app-atendimento>
      <app-instalacoes ref="app-instalacoes" tipo="1" :dadosPai="pesquisa"></app-instalacoes>
      <app-conclusao ref="app-conclusao" tipo="1" :dadosPai="pesquisa"></app-conclusao>
      <button type="button" @click="mostrar = false" class="btn btn-secondary">Fechar</button>
    </card>
    <br>

    <card>
        <div>
            <app-grid :columns="columns" :rows="rows" txtEditar="Ver" @populate="popular" />
        </div>
    </card>
  </div>
</template>
<script>
import Vue from "vue";
import Grid from "../../components/global/grid";
import ServiceRelatorio from "../../services/RelatorioService"
import ServiceFormulario from "../../services/FormularioService"
import moment from "moment";
import VueMomentJS from "vue-momentjs";
import Exames from "../exames/index"

import Identificacao from "../../components/global/steps/identificacao";
import Escolha from "../../components/global/steps/escolha";
import Profissionais from "../../components/global/steps/profissionais";
import Atendimento from "../../components/global/steps/atendimento";
import Instalacoes from "../../components/global/steps/instalacoes";
import Conclusao from "../../components/global/steps/conclusao";

Vue.use(VueMomentJS, moment);
export default {
  data: () => ({
    mostrar: false,
    columns: [{
        label: "ID",
        field: "id",
        type: "number",
        html: false,
        thClass: "text-center",
        tdClass: "text-center",
        filterable: true,
        width: "5%"
    }, {
        label: "Nome do paciente",
        field: "nome",
        filterable: true,
        placeholder: "Filtro"
    }, {
        label: "Data",
        filterable: true,
        placeholder: "Filtro",
        field: "created_at"
    }, {
        label: "",
        field: "",
        type: "name",
        html: true,
        tdClass: "text-center",
        width: "10%"
    }],
    rows: [],
    pesquisa: {}
  }),
  created() {
      this.gridRefresh();
  },
  components: {
    'app-exames': Exames,
    "app-identificacao": Identificacao,
    "app-escolha": Escolha,
    "app-profissionais": Profissionais,
    "app-atendimento": Atendimento,
    "app-instalacoes": Instalacoes,
    "app-conclusao": Conclusao
  },
  methods: {
    gridRefresh(pageChanged) {
      ServiceRelatorio.getChart('?where[tipo_pesquisa]=1').then(response => {
        let dados = response.data
        for (var key in dados){
          dados[key].created_at = moment(dados[key].created_at).format("DD/MM/YYYY H:mm")
        }
          this.rows = dados
      })
    },
    popular(id) {

      this.mostrar = true

      ServiceFormulario.get(id).then(response => {

        let dados = response.data

        dados.tipo_pesquisa = 1

        this.pesquisa = dados


      })
    },
  }
}
</script>
