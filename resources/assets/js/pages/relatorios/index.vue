<style>

.settings-card .card-body {
    padding: 0;
}

</style>

<template>

<div class="row">


    <div class="col-lg-12 col-sm-12">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li v-for="tab in tabs" class="nav-item">
                        <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
                            <fa :icon="tab.icon" fixed-width/> {{ tab.name }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>


        <!-- <card title="Pesquisas" class="settings-card">
            <ul class="nav flex-column nav-pills">
                <li v-for="tab in tabs" class="nav-item">
                    <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
                        <fa :icon="tab.icon" fixed-width/> {{ tab.name }}
                    </router-link>
                </li>
            </ul>
        </card> -->
    </div>
    <br>
    <div class="col-lg-12 col-sm-12">
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
                    route: "relatorios.internacoes"
                }, {
                    icon: "stethoscope",
                    name: "Exames",
                    route: "relatorios.exames"
                }, {
                    icon: "ambulance",
                    name: "P.A.",
                    route: "relatorios.prontoatendimentos"
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
