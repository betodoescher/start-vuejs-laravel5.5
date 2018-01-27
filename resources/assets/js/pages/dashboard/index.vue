<template>
  <div class="row">
    <div class="col-md-3">
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

    <div class="col-md-9">
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
          icon: "user",
          name: "Geral",
          route: "dashboard.geral"
        },
        {
          icon: "user",
          name: "Influência",
          route: "dashboard.influencia"
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
