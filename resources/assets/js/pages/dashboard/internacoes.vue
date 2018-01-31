<template>
<div>
  <card :title="title">
    <table class="table">
        <thead class="thead-inverse">
          <tr>
            <th>Total realizados</th>
            <th>Com Restrição</th>
            <th>Longa Permanência</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>{{total}}</th>
            <td>{{restricoes}}</td>
            <td>{{permanencia}}</td>
          </tr>
        </tbody>
      </table>


  </card>

<br>

  <card title="Visão geral">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Totais por unidade</h4>
          <br>
          <column-chart :data="totalUnidade"></column-chart>
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

  <card title="Acolhimento">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Estacionamento</h4>
          <bar-chart :data="totalEstacionamento"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Recepção central</h4>
          <bar-chart :data="totalRecepcao"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Setor de internação</h4>
          <bar-chart :data="totalSetorInternacao"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Segurança</h4>
          <bar-chart :data="totalSeguranca"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Sinalização</h4>
          <bar-chart :data="totalSinalizacao"></bar-chart>
        </div>
      </div>
  </card>

  <br>

  <card title="Hotelaria">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Aparencia e organização </h4>
          <bar-chart :data="totalAparencia"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Conforto</h4>
          <bar-chart :data="totalConforto"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Limpeza</h4>
          <bar-chart :data="totalLimpeza"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Roupa de cama/banho</h4>
          <bar-chart :data="totalCama"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Atendimento</h4>
          <bar-chart :data="totalAtendimento"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Conveniência</h4>
          <bar-chart :data="totalConveniencia"></bar-chart>
        </div>
      </div>
  </card>

  <br>

  <card title="Nutrição">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Qualidade dos alimentos </h4>
          <bar-chart :data="totalAlimentos"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Sabor e temperatura</h4>
          <bar-chart :data="totalTemperatura"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Entrega das refeições</h4>
          <bar-chart :data="totalRefeicoes"></bar-chart>
        </div>
      </div>
  </card>

  <br>

  <card title="Equipe médica">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Esclarecimentos </h4>
          <bar-chart :data="totalEsclarecimentos"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Segurança no diagnóstico</h4>
          <bar-chart :data="totalDiagnostico"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Atenção</h4>
          <bar-chart :data="totalAtenção"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Entrega das refeições</h4>
          <bar-chart :data="totalSimpatia"></bar-chart>
        </div>
      </div>
  </card>

  <br>

  <card title="Enfermagem">
      <div class="row chart">
         <div class="form-group col-md-6 text-center">
          <h4>Clareza ma informação </h4>
          <bar-chart :data="totalEnfClareza"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Atendimento</h4>
          <bar-chart :data="totalEnfAtendimento"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Atenção</h4>
          <bar-chart :data="totalEnfAtenção"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Simpatia</h4>
          <bar-chart :data="totalEnfSimpatia"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Grau de ruído</h4>
          <bar-chart :data="totalEnfRuido"></bar-chart>
        </div>
      </div>
  </card>

<br>

  <card title="Infraestrutura">
      <div class="row chart">
       <div class="form-group col-md-6 text-center">
          <h4>Atendimento as solicitações </h4>
          <bar-chart :data="totalInfClareza"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <h4>Instalações do apartamento</h4>
          <bar-chart :data="totalInfInstalacoes"></bar-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <br>
          <h4>Grau de ruído</h4>
          <bar-chart :data="totalInfRuido"></bar-chart>
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

    totalUnidade: [],
    totalTipoPesquisa: [],

    totalInfluencia: [],
    totalServicos: [],

    totalContinuidade: [],
    totalRecomentacao: [],

    totalEstacionamento: [],
    totalRecepcao: [],
    totalSetorInternacao: [],
    totalSeguranca: [],
    totalSinalizacao: [],

    totalAparencia: [],
    totalConforto: [],
    totalLimpeza: [],
    totalCama: [],
    totalAtendimento: [],
    totalConveniencia: [],

    totalAlimentos: [],
    totalTemperatura: [],
    totalRefeicoes: [],

    totalEsclarecimentos: [],
    totalDiagnostico: [],
    totalAtenção: [],
    totalSimpatia: [],

    totalEnfClareza: [],
    totalEnfAtendimento: [],
    totalEnfAtenção: [],
    totalEnfSimpatia: [],
    totalEnfRuido: [],

    totalInfClareza: [],
    totalInfInstalacoes: [],
    totalInfRuido: [],

    totalFimAcolhimento: [],
    totalFimServicos: []
  }),
  mounted() {
    this.getTotais();

    this.getValuesChartInternacao("tipo_pesquisa");

    this.getValuesChart("unidade_internacao");

    this.getValuesChart("fator_escolha");
    this.getValuesChart("utilizou_servico_antes");

    this.getValuesChart("desde_ultima_visita");
    this.getValuesChart("recomendacao");

    this.getValuesChart("if_estacionamento");
    this.getValuesChart("if_recepcao");
    this.getValuesChart("if_internacao");
    this.getValuesChart("if_seguranca");
    this.getValuesChart("if_sinalizacao");

    this.getValuesChart("if_aparencia");
    this.getValuesChart("if_conforto");
    this.getValuesChart("if_limpeza");
    this.getValuesChart("if_roupa_cama");
    this.getValuesChart("if_atendimento");
    this.getValuesChart("if_conveniencia");

    this.getValuesChart("nut_alimentos");
    this.getValuesChart("nut_temperatura");
    this.getValuesChart("nut_entrega_refeicao");

    this.getValuesChart("em_duvidas_esclarecidas");
    this.getValuesChart("em_seguranca_diagnostico");
    this.getValuesChart("em_atencao");
    this.getValuesChart("em_simpatia");

    this.getValuesChart("enf_clareza");
    this.getValuesChart("enf_atendimento");
    this.getValuesChart("enf_atencao");
    this.getValuesChart("enf_simpatia");
    this.getValuesChart("enf_grau_ruido");

    this.getValuesChart("if_atendimento_solicitacoes");
    this.getValuesChart("if_instalacoes_apartamento");
    this.getValuesChart("if_grau_ruido");

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
        "&where[tipo_pesquisa]=2";

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
        "&where[tipo_pesquisa]=2";

      Service.getChart(query).then(response => {
        switch (field) {
          case "unidade_internacao":
            this.totalUnidade = this.trataDadosChart(response.data, unidade);
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

          case "if_estacionamento":
            this.totalEstacionamento = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_recepcao":
            this.totalRecepcao = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_internacao":
            this.totalSetorInternacao = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_seguranca":
            this.totalSeguranca = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_sinalizacao":
            this.totalSinalizacao = this.trataDadosChart(
              response.data,
              questionario
            );
            break;

          case "if_aparencia":
            this.totalAparencia = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_conforto":
            this.totalConforto = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_limpeza":
            this.totalLimpeza = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_roupa_cama":
            this.totalCama = this.trataDadosChart(response.data, questionario);
            break;
          case "if_atendimento":
            this.totalAtendimento = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_conveniencia":
            this.totalConveniencia = this.trataDadosChart(
              response.data,
              questionario
            );
            break;

          case "nut_alimentos":
            this.totalAlimentos = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "nut_temperatura":
            this.totalTemperatura = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "nut_entrega_refeicao":
            this.totalRefeicoes = this.trataDadosChart(
              response.data,
              questionario
            );
            break;

          case "em_duvidas_esclarecidas":
            this.totalEsclarecimentos = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "em_seguranca_diagnostico":
            this.totalDiagnostico = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "em_atencao":
            this.totalAtenção = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "em_simpatia":
            this.totalSimpatia = this.trataDadosChart(
              response.data,
              questionario
            );
            break;

          case "enf_clareza":
            this.totalEnfClareza = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "enf_atendimento":
            this.totalEnfAtendimento = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "enf_atencao":
            this.totalEnfAtenção = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "enf_simpatia":
            this.totalEnfSimpatia = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "enf_grau_ruido":
            this.totalEnfRuido = this.trataDadosChart(
              response.data,
              questionario
            );
            break;

          case "if_atendimento_solicitacoes":
            this.totalInfClareza = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_instalacoes_apartamento":
            this.totalInfInstalacoes = this.trataDadosChart(
              response.data,
              questionario
            );
            break;
          case "if_grau_ruido":
            this.totalInfRuido = this.trataDadosChart(
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
