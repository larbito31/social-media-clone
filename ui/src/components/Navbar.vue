<template>
  <div class="z-50 flex items-center justify-between py-2">
    <div class="flex items-center gap-2">
      <img
        src="https://cdn-icons-png.flaticon.com/128/8716/8716242.png"
        alt="Berry Logo"
        class="size-7 object-cover"
      />
      <h1 class="font-brand text-indigo-600">Berry</h1>
    </div>
    <div class="relative text-sm">
      <div
        @click="isSettingsOpen = !isSettingsOpen"
        class="size-8 cursor-pointer rounded-full bg-indigo-600"
      />
      <div
        v-if="isSettingsOpen === true"
        class="absolute right-0 top-10 z-10 flex w-36 flex-col items-center justify-center gap-2 rounded-xl bg-indigo-100 py-2"
      >
        <RouterLink
          to="/profile"
          @click="isSettingsOpen = false"
          class="flex w-full cursor-pointer items-center gap-2 p-2 hover:bg-indigo-600 hover:text-white"
        >
          <UserIcon class="size-6" />
          My Profile
        </RouterLink>
        <logout-button></logout-button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import LogoutButton from "@/views/auth/LogoutButton.vue";
import { RouterLink } from "vue-router";
import { UserIcon } from "@heroicons/vue/24/outline";
const isSettingsOpen = ref(false);
</script>
