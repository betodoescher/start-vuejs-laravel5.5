<style>

.settings-card .card-body {
    padding: 0;
}

</style>

<template>

<div class="row">


    <div class="col-lg-3 col-sm-12">

        <card title="Visões" class="settings-card">
            <ul class="nav flex-column nav-pills">
                <li v-for="tab in tabs" class="nav-item">
                    <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
                        <fa :icon="tab.icon" fixed-width/> {{ tab.name }}
                    </router-link>
                </li>
            </ul>
        </card>

        <br>

        <card title="Filtros" class="settings-card">
            <div class="container-fluid row">
                <div class="form-group col-md-6">
                    <label>Início</label>
                    <app-datepicker v-model="dataInicio" @input="changeInicio" language="pt-br" input-class="form-control" format="dd/MM/yyyy" placeholder="__/__/____"></app-datepicker>
                </div>
                <div class="form-group col-md-6">
                    <label>Fim</label>
                    <app-datepicker v-model="dataFim" @input="changeFim" language="pt-br" input-class="form-control" format="dd/MM/yyyy" placeholder="__/__/____"></app-datepicker>
                </div>
            </div>
        </card>
    </div>
    <br>
    <div class="col-lg-9 col-sm-12">
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</div>

</template>

<script>

import Datepicker from "vuejs-datepicker";
export default {
    loading: false,
    data: () => ({
        dataInicio: null,
        dataFim: null,
    }),
    created() {
        this.dataInicio = this.$store.state.charts.inicio
        this.dataFim = this.$store.state.charts.fim
    },
    computed: {
        tabs() {
            return [{
                icon: "bed",
                name: "Internações",
                route: "dashboard.internacoes"
            }, {
                icon: "stethoscope",
                name: "Exames",
                route: "dashboard.exames"
            }, {
                icon: "ambulance",
                name: "P.A.",
                route: "dashboard.prontoatendimentos"
            }];
        },
        inicio() {
            return this.$store.state.charts.inicio
        },
        fim() {
            return this.$store.state.charts.fim
        }
    },
    methods: {
        changeInicio() {
                this.$store.dispatch('charts/setInicio', this.dataInicio)
            },
            changeFim() {
                this.$store.dispatch('charts/setFim', this.dataFim)
            }
    },
    components: {
        "app-datepicker": Datepicker
    }
};

</script>
