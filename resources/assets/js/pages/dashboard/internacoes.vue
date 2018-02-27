

<template>

<div>
    <card>
      <h4>Período de {{inicio | formatData}} a {{fim | formatData}}</h4>
    </card>
    <card>
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
              <h4>Tipo de pessoas</h4>
              <br>
              <rise-loader v-if="dadosChart.idetificacao.value.length == 0" loading="loading" color="blue"></rise-loader>
              <column-chart v-if="dadosChart.idetificacao.value.length > 0" :data="dadosChart.idetificacao.value"></column-chart>
          </div>
            <!-- <div class="form-group col-md-6 text-center">
                <h4>Totais por unidade</h4>
                <br>
                <rise-loader v-if="dadosChart.unidade_internacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <column-chart v-if="dadosChart.unidade_internacao.value.length > 0"  :data="dadosChart.unidade_internacao.value"></column-chart>
            </div> -->
            <div class="form-group col-md-6 text-center">
                <h4>Atendimento por tipo</h4>
                <br>
                <rise-loader v-if="totalTipoPesquisa.length == 0" loading="loading" color="blue"></rise-loader>
                <pie-chart v-if="totalTipoPesquisa.length > 0" :data="totalTipoPesquisa"></pie-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Influência">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <h4>Por fatores de influência</h4>
                <br>
                <rise-loader v-if="dadosChart.fator_escolha.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.fator_escolha.value.length > 0" :data="dadosChart.fator_escolha.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <h4>Já haviam utilizado nossos serviços</h4>
                <br>
                <rise-loader v-if="dadosChart.utilizou_servico_antes.value.length == 0" loading="loading" color="blue"></rise-loader>
                <pie-chart v-if="dadosChart.utilizou_servico_antes.value.length > 0" :data="dadosChart.utilizou_servico_antes.value"></pie-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Continuidade">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <h4>Desde a última internação</h4>
                <br>
                <rise-loader v-if="dadosChart.desde_ultima_visita.value.length == 0" loading="loading" color="blue"></rise-loader>
                <column-chart v-if="dadosChart.desde_ultima_visita.value.length > 0" :data="dadosChart.desde_ultima_visita.value"></column-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <h4>Recomendação</h4>
                <br>
                <rise-loader v-if="dadosChart.recomendacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <pie-chart v-if="dadosChart.recomendacao.value.length > 0" :data="dadosChart.recomendacao.value"></pie-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Acolhimento">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <h4>Estacionamento</h4>
                <rise-loader v-if="dadosChart.if_estacionamento.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_estacionamento.value.length > 0" :data="dadosChart.if_estacionamento.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <h4>Recepção central</h4>
                <rise-loader v-if="dadosChart.if_recepcao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_recepcao.value.length > 0" :data="dadosChart.if_recepcao.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Setor de internação</h4>
                <rise-loader v-if="dadosChart.if_internacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_internacao.value.length > 0" :data="dadosChart.if_internacao.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Segurança</h4>
                <rise-loader v-if="dadosChart.if_seguranca.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_seguranca.value.length > 0" :data="dadosChart.if_seguranca.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Sinalização</h4>
                <rise-loader v-if="dadosChart.if_sinalizacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_sinalizacao.value.length > 0" :data="dadosChart.if_sinalizacao.value"></bar-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Hotelaria">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <h4>Aparencia e organização </h4>
                <rise-loader v-if="dadosChart.if_aparencia.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_aparencia.value.length > 0" :data="dadosChart.if_aparencia.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <h4>Conforto</h4>
                <rise-loader v-if="dadosChart.if_conforto.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_conforto.value.length > 0" :data="dadosChart.if_conforto.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Limpeza</h4>
                <rise-loader v-if="dadosChart.if_limpeza.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_limpeza.value.length > 0" :data="dadosChart.if_limpeza.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Roupa de cama/banho</h4>
                <rise-loader v-if="dadosChart.if_roupa_cama.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_roupa_cama.value.length > 0" :data="dadosChart.if_roupa_cama.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Atendimento</h4>
                <rise-loader v-if="dadosChart.if_atendimento.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_atendimento.value.length > 0" :data="dadosChart.if_atendimento.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Conveniência</h4>
                <rise-loader v-if="dadosChart.if_conveniencia.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_conveniencia.value.length > 0" :data="dadosChart.if_conveniencia.value"></bar-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Nutrição">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <h4>Qualidade dos alimentos </h4>
                <rise-loader v-if="dadosChart.nut_alimentos.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.nut_alimentos.value.length > 0" :data="dadosChart.nut_alimentos.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <h4>Sabor e temperatura</h4>
                <rise-loader v-if="dadosChart.nut_temperatura.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.nut_temperatura.value.length > 0" :data="dadosChart.nut_temperatura.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Entrega das refeições</h4>
                <rise-loader v-if="dadosChart.nut_entrega_refeicao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.nut_entrega_refeicao.value.length > 0" :data="dadosChart.nut_entrega_refeicao.value"></bar-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Equipe médica">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <h4>Esclarecimentos </h4>
                <rise-loader v-if="dadosChart.em_duvidas_esclarecidas.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.em_duvidas_esclarecidas.value.length > 0" :data="dadosChart.em_duvidas_esclarecidas.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <h4>Segurança no diagnóstico</h4>
                <rise-loader v-if="dadosChart.em_seguranca_diagnostico.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.em_seguranca_diagnostico.value.length > 0" :data="dadosChart.em_seguranca_diagnostico.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Atenção</h4>
                <rise-loader v-if="dadosChart.em_atencao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.em_atencao.value.length > 0" :data="dadosChart.em_atencao.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Entrega das refeições</h4>
                <rise-loader v-if="dadosChart.em_simpatia.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.em_simpatia.value.length > 0" :data="dadosChart.em_simpatia.value"></bar-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Enfermagem">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <h4>Clareza ma informação </h4>
                <rise-loader v-if="dadosChart.enf_clareza.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.enf_clareza.value.length > 0" :data="dadosChart.enf_clareza.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <h4>Atendimento</h4>
                <rise-loader v-if="dadosChart.enf_atendimento.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.enf_atendimento.value.length > 0" :data="dadosChart.enf_atendimento.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Atenção</h4>
                <rise-loader v-if="dadosChart.enf_atencao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.enf_atencao.value.length > 0" :data="dadosChart.enf_atencao.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Simpatia</h4>
                <rise-loader v-if="dadosChart.enf_simpatia.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.enf_simpatia.value.length > 0" :data="dadosChart.enf_simpatia.value"></bar-chart>
            </div>
            <!-- <div class="form-group col-md-6 text-center">
                <br>
                <h4>Grau de ruído</h4>
                <rise-loader v-if="dadosChart.enf_grau_ruido.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.enf_grau_ruido.value.length > 0" :data="dadosChart.enf_grau_ruido.value"></bar-chart>
            </div> -->
        </div>
    </card>

    <br>

    <card title="Infraestrutura">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <h4>Atendimento as solicitações </h4>
                <rise-loader v-if="dadosChart.if_atendimento_solicitacoes.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_atendimento_solicitacoes.value.length > 0" :data="dadosChart.if_atendimento_solicitacoes.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <h4>Instalações do apartamento</h4>
                <rise-loader v-if="dadosChart.if_instalacoes_apartamento.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_instalacoes_apartamento.value.length > 0" :data="dadosChart.if_instalacoes_apartamento.value"></bar-chart>
            </div>
            <!-- <div class="form-group col-md-6 text-center">
                <br>
                <h4>Grau de ruído</h4>
                <rise-loader v-if="dadosChart.if_grau_ruido.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_grau_ruido.value.length > 0" :data="dadosChart.if_grau_ruido.value"></bar-chart>
            </div> -->
        </div>
    </card>

    <br>

    <card title="Considerações finais">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Humanização e acolhimento</h4>
                <rise-loader v-if="dadosChart.atendimento_humanizado.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.atendimento_humanizado.value.length > 0" :data="dadosChart.atendimento_humanizado.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Satisfação com os serviços</h4>
                <rise-loader v-if="dadosChart.satisfeito.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.satisfeito.value.length > 0" :data="dadosChart.satisfeito.value"></bar-chart>
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
import RiseLoader from 'vue-spinner/src/RiseLoader.vue'

Vue.use(VueChartkick, {
    Chartkick
});

// import {
//     unidade
// }
// from "../../services/store/unidade";
import {
    andar
}
from "../../services/store/andar";
import {
    tipo_pessoa
}
from "../../services/store/tipo_pessoa";
import {
    tipo_acompanhante
}
from "../../services/store/tipo_acompanhante";
import {
    impedimento
}
from "../../services/store/impedimento";
import {
    tipo_pesquisa
}
from "../../services/store/tipo_pesquisa";
import {
    questionario
}
from "../../services/store/quetionario";
import {
    fatores
}
from "../../services/store/fatores";
import {
    simnao
}
from "../../services/store/simnao";
import {
    ultima_internacao
}
from "../../services/store/ultima_internacao";

import Service from "../../services/RelatorioService";
import ServiceFormulario from "../../services/FormularioService";

import moment from "moment";
import VueMomentJS from "vue-momentjs";

Vue.use(VueMomentJS, moment);

export default {

    data: () => ({
        title: '',
        total: 0,
        restricoes: 0,
        permanencia: 0,
        andar,
        tipo_pessoa,
        tipo_acompanhante,
        impedimento,
        tipo_pesquisa,
        questionario,
        fatores,
        simnao,
        ultima_internacao,
        totalTipoPesquisa: [],
        dadosChart: {
          idetificacao: { name: 'preenchido_por', value: [], dadosParaTratar: tipo_acompanhante},
             fator_escolha: { name: 'fator_escolha', value: [], dadosParaTratar: fatores},
             utilizou_servico_antes: { name: 'utilizou_servico_antes', value: [], dadosParaTratar: simnao},
             desde_ultima_visita: { name: 'desde_ultima_visita', value: [], dadosParaTratar: ultima_internacao},
             recomendacao: { name: 'recomendacao', value: [], dadosParaTratar: simnao},
             if_estacionamento: { name: 'if_estacionamento', value: [], dadosParaTratar: questionario},
             if_recepcao: { name: 'if_recepcao', value: [], dadosParaTratar: questionario},
             if_internacao: { name: 'if_internacao', value: [], dadosParaTratar: questionario},
             if_seguranca: { name: 'if_seguranca', value: [], dadosParaTratar: questionario},
             if_sinalizacao: { name: 'if_sinalizacao', value: [], dadosParaTratar: questionario},
             if_aparencia: { name: 'if_aparencia', value: [], dadosParaTratar: questionario},
             if_conforto: { name: 'if_conforto', value: [], dadosParaTratar: questionario},
             if_limpeza: { name: 'if_limpeza', value: [], dadosParaTratar: questionario},
             if_roupa_cama: { name: 'if_roupa_cama', value: [], dadosParaTratar: questionario},
             if_atendimento: { name: 'if_atendimento', value: [], dadosParaTratar: questionario},
             if_conveniencia: { name: 'if_conveniencia', value: [], dadosParaTratar: questionario},
             nut_alimentos: { name: 'nut_alimentos', value: [], dadosParaTratar: questionario},
             nut_temperatura: { name: 'nut_temperatura', value: [], dadosParaTratar: questionario},
             nut_entrega_refeicao: { name: 'nut_entrega_refeicao', value: [], dadosParaTratar: questionario},
             em_duvidas_esclarecidas: { name: 'em_duvidas_esclarecidas', value: [], dadosParaTratar: questionario},
             em_seguranca_diagnostico: { name: 'em_seguranca_diagnostico', value: [], dadosParaTratar: questionario},
             em_atencao: { name: 'em_atencao', value: [], dadosParaTratar: questionario},
             em_simpatia: { name: 'em_simpatia', value: [], dadosParaTratar: questionario},
             enf_clareza: { name: 'enf_clareza', value: [], dadosParaTratar: questionario},
             enf_atendimento: { name: 'enf_atendimento', value: [], dadosParaTratar: questionario},
             enf_atencao: { name: 'enf_atencao', value: [], dadosParaTratar: questionario},
             enf_simpatia: { name: 'enf_simpatia', value: [], dadosParaTratar: questionario},
             // enf_grau_ruido: { name: 'enf_grau_ruido', value: [], dadosParaTratar: questionario},
             if_atendimento_solicitacoes: { name: 'if_atendimento_solicitacoes', value: [], dadosParaTratar: questionario},
             if_instalacoes_apartamento: { name: 'if_instalacoes_apartamento', value: [], dadosParaTratar: questionario},
             // if_grau_ruido: { name: 'if_grau_ruido', value: [], dadosParaTratar: questionario},
             atendimento_humanizado: { name: 'atendimento_humanizado', value: [], dadosParaTratar: questionario},
             unidade_internacao: { name: 'unidade_internacao', value: [], dadosParaTratar: []},
             satisfeito: { name: 'satisfeito', value: [], dadosParaTratar: questionario}
          }
    }),
    components: {
        'rise-loader': RiseLoader
    },
    filters: {
      formatData: function (value) {
      return moment(value).format("DD/MM/YYYY")
      }
    },
    created() {
      this.$store.dispatch('unidade/getAll')
      console.log(this.dadosChart)
      this.updateChats()
    },
    computed: {
        inicio() {
                return this.$store.state.charts.inicio
            },
            fim() {
                return this.$store.state.charts.fim
            },
            unidades() {
                return this.$store.state.unidade.unidades
            }
    },
    watch: {
        inicio: function() {
            this.updateChats()
        },
        fim: function() {
            this.updateChats()
        },
        unidades: function(dados) {
            this.dadosChart.unidade_internacao.dadosParaTratar = dados
        }

    },
    methods: {
            async  updateChats() {

              this.getTotais();
              this.getValuesChartInternacao("tipo_pesquisa");

              for (var key in this.dadosChart) {

                  this.dadosChart[key].value = []

                  var field = this.dadosChart[key].name

                  var query =
                      "?fields=count(*) as total," +
                      field +
                      " as id&group=" +
                      field +
                      "&notnull=" +
                      field +
                      "&where[tipo_pesquisa]=2"+
                      "&between='"+moment(this.inicio).format("YYYY-MM-DD")+"','"+moment(this.fim).format("YYYY-MM-DD")+"'"

                  await  ServiceFormulario.getChart(query).then(response => {
                        this.dadosChart[key].value = this.trataDadosChart(response.data.data, this.dadosChart[key].dadosParaTratar);
                  })
              }
            },
            getTotais() {

                var query =
                    "?fields=count(*) as total&where[tipo_pesquisa]=2"+
                    "&between='"+moment(this.inicio).format("YYYY-MM-DD")+"','"+moment(this.fim).format("YYYY-MM-DD")+"'";

                ServiceFormulario.getChart(query).then(response => {
                  this.total = 0
                  if(response.data.data.length > 0){
                    this.total = response.data.data[0].total
                  }
                });

                var field = "impediemntos"
                var query =
                    "?fields=count(*) as total," +
                    field +
                    " as id&group=" +
                    field +
                    "&notnull=" +
                    field +
                    "&where[tipo_pesquisa]=2"+
                    "&between='"+moment(this.inicio).format("YYYY-MM-DD")+"','"+moment(this.fim).format("YYYY-MM-DD")+"'";

                ServiceFormulario.getChart(query).then(response => {
                  this.restricoes = 0
                  this.permanencia = 0
                  if(response.data.data.length > 0){
                    this.restricoes = response.data.data[0].total
                    this.permanencia = response.data.data[1].total
                  }
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
                    field+
                    "&between='"+moment(this.inicio).format("YYYY-MM-DD")+"','"+moment(this.fim).format("YYYY-MM-DD")+"'";

                ServiceFormulario.getChart(query).then(response => {
                    this.totalTipoPesquisa = this.trataDadosChart(
                        response.data.data,
                        tipo_pesquisa
                    );
                });
            },
    }
};

</script>
