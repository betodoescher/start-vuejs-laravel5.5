<template>
  <div class="row">
    <div class="col-md-2">
      <card title="Visões" class="settings-card">
        <ul class="nav flex-column nav-pills">
           <li v-for="tab in tabs" class="nav-item">
            <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
              <fa :icon="tab.icon" fixed-width/>
              {{ tab.name }}
            </router-link>
          </li> 
        </ul>
      </card>
    </div>

    <div class="col-md-10">
      <transition name="fade" mode="out-in">
        <router-view></router-view>
      </transition>
    </div>
  </div>
</template>

<script>
export default {
  loading: false,

  computed: {
    tabs() {
      return [
        {
          icon: "bed",
          name: "Internações",
          route: "dashboard.internacoes"
        },
        {
          icon: "stethoscope",
          name: "Exames",
          route: "dashboard.exames"
        },
        {
          icon: "ambulance",
          name: "P.A.",
          route: "dashboard.prontoatendimentos"
        }
      ];
    }
  }
};
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
