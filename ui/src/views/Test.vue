<script setup>
import { ref } from "vue";

const message = ref("Hello World!");
</script>

<template>
  <div>
    <h1>{{ message }}</h1>
    <div class="text-center">
      <h1>Test</h1>
    </div>
  </div>
</template>