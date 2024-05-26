<template>
  <div class="bg-indigo-50 px-6 font-nunito text-slate-900">
    <Navbar />
    <RouterView />
  </div>
</template>

<script setup>
import { RouterLink, RouterView } from "vue-router";
import Navbar from "@/components/Navbar.vue";
</script>
