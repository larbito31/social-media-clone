import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Register from "@/views/auth/Register.vue";
import Login from "@/views/auth/Login.vue";
import ProfilePage from "@/views/ProfilePage.vue";
import { isAuthenticated } from "@/services/auth.js";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      component: Home,
      meta: { requiresAuth: true },
    },
    {
      path: "/register",
      component: Register,
    },
    {
      path: "/login",
      component: Login,
    },
    {
      path: "/profile",
      component: ProfilePage,
    },
  ],
});

router.beforeEach(async (to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    const auth = await isAuthenticated();
    if (!auth) {
      return next({ path: "/login" });
    }
  }
  next();
});

export default router;
