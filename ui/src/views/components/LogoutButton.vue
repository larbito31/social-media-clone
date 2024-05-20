<template>
  <button @click="logout" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    Logout
  </button>
</template>

<script>
import axios from "@/services/axios.js";

export default {
  name: 'LogoutButton',

  methods: {
    logout() {
      axios.post('/v1/logout')
          .then(response => {
            // TODO: Add a status message or dialog with spinner   that indicates the logout was successful before th user will be redirected to the login page.
            console.log('Logout successful');
            // Remove the JWT from local storage
            localStorage.removeItem('jwt');
            this.$router.push('/login');

          })
          .catch(error => {
            console.error('Login error:', error.response ? error.response.data : 'Unknown error');
          });

    }
  }
}
</script>
