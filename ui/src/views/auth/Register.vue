<template>
  <div class="flex h-screen items-center justify-center py-12">
    <div
      class="flex flex-col justify-center rounded-lg bg-slate-50 px-6 py-12 text-slate-800 sm:mx-auto sm:w-full sm:max-w-md lg:px-8"
    >
      <div class="mx-auto w-full">
        <!-- Logo & Brand Name -->

        <div class="flex items-center justify-center gap-3">
          <img
            class="size-10"
            src="https://cdn-icons-png.flaticon.com/128/4057/4057300.png"
            alt="Berry Logo"
          />
          <h1 class="pt-1 font-semibold italic">Berry</h1>
        </div>
        <h2
          class="mt-10 text-center text-2xl font-semibold leading-9 tracking-tight"
        >
          Create your account
        </h2>
      </div>
      <div class="relative mt-10 w-full">
        <!-- User Details -->

        <form class="space-y-6" @submit.prevent="register">
          <div>
            <label for="username" class="text-sm font-semibold leading-6"
              >Full Name</label
            >
            <div class="mt-2">
              <input
                id="username"
                name="username"
                type="text"
                v-model="username"
                placeholder="Your Name"
                required
                class="w-full rounded-md border-0 p-1.5 shadow-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>
          <div>
            <label for="email" class="text-sm font-semibold leading-6"
              >Email address</label
            >
            <div class="mt-2">
              <input
                id="email"
                name="email"
                type="email"
                v-model="email"
                autocomplete="email"
                placeholder="name@example.com"
                required
                class="w-full rounded-md border-0 p-1.5 shadow-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="text-sm font-semibold leading-6"
                >Password</label
              >
            </div>
            <div class="mt-2">
              <input
                id="password"
                name="password"
                type="password"
                v-model="password"
                autocomplete="current-password"
                placeholder="********"
                required
                class="w-full rounded-md border-0 p-1.5 shadow-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-600"
              />
            </div>
          </div>

          <div>
            <button
              type="submit"
              class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
              Register
            </button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm text-slate-500">
          Already have an account?
          <RouterLink
            to="/login"
            class="inline-flex font-semibold leading-6 text-indigo-600 underline hover:text-indigo-500"
          >
            Login!
          </RouterLink>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { RouterLink } from "vue-router";
import axios from "@/services/axios.js";

export default {
  data() {
    return {
      email: "",
      password: "",
      username: "",
    };
  },

  methods: {
    register() {
      const userData = {
        name: this.username,
        email: this.email,
        password: this.password,
      };

      axios
        .post("/v1/register", userData)
        .then((response) => {
          // TODO: Add a status message dialog or whatever  that indicates the register was successful before th user will be redirected to the login page .
          console.log("Login successful:", response.data);
          this.$router.push("/login");
        })
        .catch((error) => {
          console.error(
            "Login error:",
            error.response ? error.response.data : "Unknown error",
          );
        });
    },
  },
};
</script>
