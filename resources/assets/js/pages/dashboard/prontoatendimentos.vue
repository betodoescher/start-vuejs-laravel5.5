<template>
<div>
  <card :title="title">
    <table class="table">
        <thead class="thead-inverse">
          <tr>
            <th>Total realizados</th>
            <!-- <th>Com Restrição</th>
            <th>Longa Permanência</th> -->
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>{{total}}</th>
            <!-- <td>{{restricoes}}</td>
            <td>{{permanencia}}</td> -->
          </tr>
        </tbody>
      </table>


  </card>

<br>

  <card title="Visão geral">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Tipo de pessoas</h4>
          <br>
          <column-chart :data="totalPessoaPreencheu"></column-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Atendimento por tipo</h4>
          <br>
          <pie-chart :data="totalTipoPesquisa"></pie-chart>
        </div>
      </div>
  </card>

  <br>

  <card title="Influência">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Por fatores de influência</h4>
          <br>
          <bar-chart :data="totalInfluencia"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Já haviam utilizado nossos serviços</h4>
          <br>
          <pie-chart :data="totalServicos"></pie-chart>
        </div>
      </div>
  </card>

  <br>
  
  <card title="Continuidade">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Desde a última internação</h4>
          <br>
          <column-chart :data="totalContinuidade"></column-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Recomendação</h4>
          <br>
          <pie-chart :data="totalRecomentacao"></pie-chart>
        </div>
      </div>
  </card>

  <br>

  <card title="Profissionais">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Central de agendamento</h4>
          <bar-chart :data="totalProfAgendamentos"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Recepcionista</h4>
          <bar-chart :data="totalProfRecepcionista"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Segurança</h4>
          <bar-chart :data="totalProfSeguranca"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Enfermagem</h4>
          <bar-chart :data="totalProfEnfermagem"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Equipe médica</h4>
          <bar-chart :data="totalProfEqpMedica"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Técnicos</h4>
          <bar-chart :data="totalProfTecnicos"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Orientações do agendamento </h4>
          <bar-chart :data="totalProfOrientacoes"></bar-chart>
        </div>
      </div>
  </card>

  <br>

   <card title="Atendimento">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Central de agendamento</h4>
          <bar-chart :data="totalAteAgendamentos"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Recepção</h4>
          <bar-chart :data="totalAteRecepcionista"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Enfermagem</h4>
          <bar-chart :data="totalAteEnfermagem"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Equipe médica</h4>
          <bar-chart :data="totalAteEqpMedica"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Entrega de laudos</h4>
          <bar-chart :data="totalAteLaudos"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Administração da medicação </h4>
          <bar-chart :data="totalAteMedicacao"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Imobilizações e curativos </h4>
          <bar-chart :data="totalAteCurativos"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Realização de exames de laboratoriais </h4>
          <bar-chart :data="totalAteExamesLab"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Realização de exames de image </h4>
          <bar-chart :data="totalAteExamesImg"></bar-chart>
        </div>
      </div>
  </card>

  <br>

  <card title="Instalações">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Conforto</h4>
          <bar-chart :data="totalIfConforto"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Limpeza</h4>
          <bar-chart :data="totalIfLimpeza"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Aparência e organização das instalações</h4>
          <bar-chart :data="totalIfAparencia"></bar-chart>
        </div>
        
      </div>
  </card>

  <br>

  <card title="Considerações finais">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Humanização e acolhimento</h4>
          <bar-chart :data="totalFimAcolhimento"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Satisfação com os serviços</h4>
          <bar-chart :data="totalFimServicos"></bar-chart>
        </div>
      </div>
  </card>



</div>
</template>

<script>
import Vue from "vue";
import Chartkick from "chartkick";
import VueChartkick from "vue-chartkick";
import Chart from "chart.js";

Vue.use(VueChartkick, { Chartkick });

import { unidade } from "../../services/store/unidade";
import { andar } from "../../services/store/andar";
import { tipo_pessoa } from "../../services/store/tipo_pessoa";
import { tipo_acompanhante } from "../../services/store/tipo_acompanhante";
import { impedimento } from "../../services/store/impedimento";
import { tipo_pesquisa } from "../../services/store/tipo_pesquisa";
import { questionario } from "../../services/store/quetionario";
import { fatores } from "../../services/store/fatores";
import { simnao } from "../../services/store/simnao";
import { ultima_internacao } from "../../services/store/ultima_internacao";

import Service from "../../services/RelatorioService";

import moment from "moment";
import VueMomentJS from "vue-momentjs";

Vue.use(VueMomentJS, moment);

export default {
  data: () => ({
    title:
      "Totais referente ao mês e ano vigente. (" +
      moment().format("M/YYYY") +
      ")",
    total: 0,
    restricoes: 0,
    permanencia: 0,
    unidade,
    andar,
    tipo_pessoa,
    tipo_acompanhante,
    impedimento,
    tipo_pesquisa,
    questionario,
    fatores,
    simnao,
    ultima_internacao,

    totalPessoaPreencheu: [],
    totalTipoPesquisa: [],

    totalInfluencia: [],
    totalServicos: [],

    totalContinuidade: [],
    totalRecomentacao: [],

    totalProfAgendamentos: [],
    totalProfRecepcionista: [],
    totalProfSeguranca: [],
    totalProfEnfermagem: [],
    totalProfEqpMedica: [],
    totalProfTecnicos: [],
    totalProfOrientacoes: [],

    totalAteAgendamentos: [],
    totalAteRecepcionista: [],
    totalAteEnfermagem: [],
    totalAteEqpMedica: [],
    totalAteLaudos: [],
    totalAteMedicacao: [],
    totalAteCurativos: [],
    totalAteExamesLab: [],
    totalAteExamesImg: [],

    totalIfConforto: [],
    totalIfLimpeza: [],
    totalIfAparencia: [],

    totalFimAcolhimento: [],
    totalFimServicos: []
  }),
  mounted() {
    this.getTotais();

    this.getValuesChartInternacao("tipo_pesquisa");

    this.getValuesChart("idetificacao");

    this.getValuesChart("fator_escolha");
    this.getValuesChart("utilizou_servico_antes");

    this.getValuesChart("desde_ultima_visita");
    this.getValuesChart("recomendacao");

    this.getValuesChart("atp_central_agendamento");
    this.getValuesChart("atp_recepcionista");
    this.getValuesChart("atp_seguranca");
    this.getValuesChart("atp_enfermagem");
    this.getValuesChart("atp_equipe_medica");
    this.getValuesChart("atp_tec_imobilizacao");
    this.getValuesChart("agendamento_orientacao");

    this.getValuesChart("ta_central_agendamento");
    this.getValuesChart("ta_recepcionista");
    this.getValuesChart("ta_enfermagem");
    this.getValuesChart("ta_equipe_medica");
    this.getValuesChart("ta_entrega_laudo");
    this.getValuesChart("ta_administracao_medicacao");
    this.getValuesChart("ta_imobilizacao_curativo");
    this.getValuesChart("ta_exames");
    this.getValuesChart("ta_realizacao_exame");

    this.getValuesChart("if_conforto");
    this.getValuesChart("if_limpeza");
    this.getValuesChart("if_aparencia");

    this.getValuesChart("atendimento_humanizado");
    this.getValuesChart("satisfeito");
  },
  methods: {
    getTotais() {
      
      var query =
        "?fields=count(*) as total&where[tipo_pesquisa]=2";

      Service.getChart(query).then(response => {
        this.total = response.data[0].total
      });

      var field = "impediemntos"
      var query =
        "?fields=count(*) as total," +
        field +
        " as id&group=" +
        field +
        "&notnull=" +
        field +
        "&where[tipo_pesquisa]=3";

      Service.getChart(query).then(response => {
        this.restricoes = response.data[0].total
        this.permanencia = response.data[1].total
      });
    },
    trataDadosChart(ddBase, ddOptions) {
      var dadosTratados = [];

      for (var key in ddBase) {
        for (var opt in ddOptions) {
          if (ddOptions[opt].value == ddBase[key].id) {
            dadosTratados[key] = [ddOptions[opt].text, ddBase[key].total];
          }
        }
      }

      return dadosTratados;
    },
    getValuesChartInternacao(field) {
      var query =
        "?fields=count(*) as total," +
        field +
        " as id&group=" +
        field +
        "&notnull=" +
        field;

      Service.getChart(query).then(response => {
        this.totalTipoPesquisa = this.trataDadosChart(
          response.data,
          tipo_pesquisa
        );
      });
    },
    getValuesChart(field) {
      var query =
        "?fields=count(*) as total," +
        field +
        " as id&group=" +
        field +
        "&notnull=" +
        field +
        "&where[tipo_pesquisa]=3";

      Service.getChart(query).then(response => {
        switch (field) {
          case "idetificacao":
            this.totalPessoaPreencheu = this.trataDadosChart(response.data, tipo_pessoa);
            break;

          case "fator_escolha":
            this.totalInfluencia = this.trataDadosChart(response.data, fatores);
            break;
          case "utilizou_servico_antes":
            this.totalServicos = this.trataDadosChart(response.data, simnao);
            break;

          case "desde_ultima_visita":
            this.totalContinuidade = this.trataDadosChart(
              response.data,
              ultima_internacao
            );
            break;
          case "recomendacao":
            this.totalRecomentacao = this.trataDadosChart(
              response.data,
              simnao
            );
            break;

          case "atp_central_agendamento":
            this.totalProfAgendamentos = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "atp_recepcionista":
            this.totalProfRecepcionista = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "atp_seguranca":
            this.totalProfSeguranca = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "atp_enfermagem":
            this.totalProfEnfermagem = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "atp_equipe_medica":
            this.totalProfEqpMedica = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "atp_tec_imobilizacao":
            this.totalProfTecnicos = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "agendamento_orientacao":
            this.totalProfOrientacoes = this.trataDadosChart(
              response.data,
              questionario
            );
            break;

          case "ta_central_agendamento":
            this.totalAteAgendamentos = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "ta_recepcionista":
            this.totalAteRecepcionista = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "ta_enfermagem":
            this.totalAteEnfermagem = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "ta_equipe_medica":
            this.totalAteEqpMedica = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "ta_entrega_laudo":
            this.totalAteLaudos = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "ta_administracao_medicacao":
            this.totalAteMedicacao = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "ta_imobilizacao_curativo":
            this.totalAteCurativos = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "ta_exames":
            this.totalAteExamesLab = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "ta_realizacao_exame":
            this.totalAteExamesImg = this.trataDadosChart(
              response.data,
              questionario
            );
            break;

          case "if_conforto":
            this.totalIfConforto = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_limpeza":
            this.totalIfLimpeza = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_aparencia":
            this.totalIfAparencia = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
            
          case "atendimento_humanizado":
            this.totalFimAcolhimento = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "satisfeito":
            this.totalFimServicos = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
        }
      });
    }
  }
};
</script>
