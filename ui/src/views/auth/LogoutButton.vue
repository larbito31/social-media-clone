<template>
  <button
    @click="logout"
    class="flex w-full items-center gap-2 p-2 hover:bg-indigo-600 hover:text-white"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke-width="1.5"
      stroke="currentColor"
      class="size-6"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"
      />
    </svg>
    Logout
  </button>
</template>

<script>
import axios from "@/services/axios.js";

export default {
  name: "LogoutButton",

  methods: {
    logout() {
      axios
        .post("/v1/logout")
        .then((response) => {
          // TODO: Add a status message or dialog with spinner   that indicates the logout was successful before th user will be redirected to the login page.
          console.log("Logout successful");
          // Remove the JWT from local storage
          localStorage.removeItem("jwt");
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
