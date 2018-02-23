

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
                <rise-loader v-if="dadosChart.idetificacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <column-chart v-if="dadosChart.idetificacao.value.length > 0" :data="dadosChart.idetificacao.value"></column-chart>
            </div>
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

    <card title="Profissionais">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Central de agendamento</h4>
                <rise-loader v-if="dadosChart.atp_central_agendamento.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.atp_central_agendamento.value.length > 0" :data="dadosChart.atp_central_agendamento.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Recepcionista</h4>
                <rise-loader v-if="dadosChart.atp_recepcionista.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.atp_recepcionista.value.length > 0"  :data="dadosChart.atp_recepcionista.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Segurança</h4>
                <rise-loader v-if="dadosChart.atp_seguranca.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.atp_seguranca.value.length > 0" :data="dadosChart.atp_seguranca.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Enfermagem</h4>
                <rise-loader v-if="dadosChart.atp_enfermagem.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.atp_enfermagem.value.length > 0" :data="dadosChart.atp_enfermagem.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Equipe médica</h4>
                  <rise-loader v-if="dadosChart.atp_equipe_medica.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.atp_equipe_medica.value.length > 0" :data="dadosChart.atp_equipe_medica.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Técnicos</h4>
                <rise-loader v-if="dadosChart.atp_tec_imobilizacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.atp_tec_imobilizacao.value.length > 0" :data="dadosChart.atp_tec_imobilizacao.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Orientações do agendamento </h4>
                <rise-loader v-if="dadosChart.agendamento_orientacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.agendamento_orientacao.value.length > 0" :data="dadosChart.agendamento_orientacao.value"></bar-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Atendimento">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Central de agendamento</h4>
                <rise-loader v-if="dadosChart.ta_central_agendamento.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_central_agendamento.value.length > 0" :data="dadosChart.ta_central_agendamento.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Recepção</h4>
                <rise-loader v-if="dadosChart.ta_recepcionista.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_recepcionista.value.length > 0" :data="dadosChart.ta_recepcionista.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Enfermagem</h4>
                <rise-loader v-if="dadosChart.ta_enfermagem.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_enfermagem.value.length > 0" :data="dadosChart.ta_enfermagem.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Equipe médica</h4>
                <rise-loader v-if="dadosChart.ta_equipe_medica.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_equipe_medica.value.length > 0" :data="dadosChart.ta_equipe_medica.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Entrega de laudos</h4>
                <rise-loader v-if="dadosChart.ta_entrega_laudo.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_entrega_laudo.value.length > 0" :data="dadosChart.ta_entrega_laudo.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Administração da medicação </h4>
                <rise-loader v-if="dadosChart.ta_administracao_medicacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_administracao_medicacao.value.length > 0" :data="dadosChart.ta_administracao_medicacao.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Imobilizações e curativos </h4>
                <rise-loader v-if="dadosChart.ta_administracao_medicacao.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_administracao_medicacao.value.length > 0" :data="dadosChart.ta_imobilizacao_curativo.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Realização de exames de laboratoriais </h4>
                <rise-loader v-if="dadosChart.ta_exames.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_exames.value.length > 0" :data="dadosChart.ta_exames.value"></bar-chart>
            </div>
            <div class="form-group col-md-6 text-center">
                <br>
                <h4>Realização de exames de image </h4>
                <rise-loader v-if="dadosChart.ta_realizacao_exame.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.ta_realizacao_exame.value.length > 0" :data="dadosChart.ta_realizacao_exame.value"></bar-chart>
            </div>
        </div>
    </card>

    <br>

    <card title="Instalações">
        <div class="row chart">
            <div class="form-group col-md-6 text-center">
                <br>
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
                <h4>Aparência e organização das instalações</h4>
                <rise-loader v-if="dadosChart.if_aparencia.value.length == 0" loading="loading" color="blue"></rise-loader>
                <bar-chart v-if="dadosChart.if_aparencia.value.length > 0" :data="dadosChart.if_aparencia.value"></bar-chart>
            </div>

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

import {
    unidade
}
from "../../services/store/unidade";
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
        title: "Totais referente ao mês e ano vigente. (" +
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
        totalTipoPesquisa: [],
        totalInfluencia: [],
        dadosChart: {
             idetificacao: { name: 'idetificacao', value: [], dadosParaTratar: tipo_pessoa},
             fator_escolha: { name: 'fator_escolha', value: [], dadosParaTratar: fatores},
             utilizou_servico_antes: { name: 'utilizou_servico_antes', value: [], dadosParaTratar: simnao},
             desde_ultima_visita: { name: 'desde_ultima_visita', value: [], dadosParaTratar: ultima_internacao},
             recomendacao: { name: 'recomendacao', value: [], dadosParaTratar: simnao},
             atp_central_agendamento: { name: 'atp_central_agendamento', value: [], dadosParaTratar: questionario},
             atp_recepcionista: { name: 'atp_recepcionista', value: [], dadosParaTratar: questionario},
             atp_seguranca: { name: 'atp_seguranca', value: [], dadosParaTratar: questionario},
             atp_enfermagem: { name: 'atp_enfermagem', value: [], dadosParaTratar: questionario},
             atp_equipe_medica: { name: 'atp_equipe_medica', value: [], dadosParaTratar: questionario},
             atp_tec_imobilizacao: { name: 'atp_tec_imobilizacao', value: [], dadosParaTratar: questionario},
             agendamento_orientacao: { name: 'agendamento_orientacao', value: [], dadosParaTratar: questionario},
             ta_central_agendamento: { name: 'ta_central_agendamento', value: [], dadosParaTratar: questionario},
             ta_recepcionista: { name: 'ta_recepcionista', value: [], dadosParaTratar: questionario},
             ta_enfermagem: { name: 'ta_enfermagem', value: [], dadosParaTratar: questionario},
             ta_equipe_medica: { name: 'ta_equipe_medica', value: [], dadosParaTratar: questionario},
             ta_entrega_laudo: { name: 'ta_entrega_laudo', value: [], dadosParaTratar: questionario},
             ta_administracao_medicacao: { name: 'ta_administracao_medicacao', value: [], dadosParaTratar: questionario},
             ta_imobilizacao_curativo: { name: 'ta_imobilizacao_curativo', value: [], dadosParaTratar: questionario},
             ta_exames: { name: 'ta_exames', value: [], dadosParaTratar: questionario},
             ta_realizacao_exame: { name: 'ta_realizacao_exame', value: [], dadosParaTratar: questionario},
             if_conforto: { name: 'if_conforto', value: [], dadosParaTratar: questionario},
             if_limpeza: { name: 'if_limpeza', value: [], dadosParaTratar: questionario},
             if_aparencia: { name: 'if_aparencia', value: [], dadosParaTratar: questionario},
             atendimento_humanizado: { name: 'atendimento_humanizado', value: [], dadosParaTratar: questionario},
             satisfeito: { name: 'satisfeito', value: [], dadosParaTratar: questionario}
        }
    }),
    components: {
        'rise-loader': RiseLoader
    },
    filters: {
        formatData: function(value) {
            return moment(value).format("DD/MM/YYYY")
        }
    },
    computed: {
        inicio() {
                return this.$store.state.charts.inicio
            },
            fim() {
                return this.$store.state.charts.fim
            }
    },
    watch: {
        inicio: function() {
            this.updateChats()
        },
        fim: function() {
            this.updateChats()
        }
    },
    created() {

      this.updateChats()
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
                      "&where[tipo_pesquisa]=1"+
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
                    "&where[tipo_pesquisa]=1"+
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
            }

    }
};

</script>
