// Imports
import Vue    from "vue";
import Router from "vue-router";

// Components to route to
import Production     from "./views/Production.vue";
import Packaging      from "./views/Packaging.vue";
import Receiving      from "./views/Receiving.vue";
import Warehouse      from "./views/Warehouse.vue";
import Home           from "./views/Home.vue";

// Use the vue router
Vue.use(Router);

// Configure the routes
export default new Router({
  routes: [
    {
      path:      "/",
      name:      "home",
      component: Home,
      meta: {
        title: 'Home Page'
      }
    },
    {
      path:      "/production",
      name:      "production",
      component: Production,
      meta: {
        title: 'Production Page'
      }
    },
    {
      path:      "/packaging",
      name:      "packaging",
      component: Packaging,
      meta: {
        title: 'Packaging Page'
      }
    },
    {
      path:      "/warehouse",
      name:      "warehouse",
      component: Warehouse,
      meta: {
        title: 'Warehouse Page'
      }
    },
    {
      path:      "/receiving",
      name:      "receiving",
      component: Receiving,
      meta: {
        title: 'Receiving Page'
      }
    }
  ]
});
