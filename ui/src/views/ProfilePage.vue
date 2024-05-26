<template>
  <div class="flex flex-col gap-4 py-6">
    <div class="flex h-96 gap-4">
      <div class="flex w-full flex-col overflow-hidden rounded-xl bg-white">
        <div class="relative h-4/6 bg-indigo-400">
          <div
            class="absolute -bottom-12 left-8 size-40 rounded-full bg-indigo-700"
          ></div>
        </div>
        <div class="flex h-2/6 items-end justify-between bg-white px-8 py-4">
          <div class="ml-4">
            <h2>User Name</h2>
            <p>Profession, Company</p>
          </div>
          <div class="flex items-center gap-4">
            <button
              @click="isEditing = true"
              class="rounded bg-indigo-500 px-4 py-1 text-white"
            >
              Edit Profile
            </button>
            <div
              v-if="isEditing"
              class="fixed inset-0 flex items-center justify-center bg-black/30"
            >
              <div class="flex w-1/2 flex-col rounded-xl bg-white py-4">
                <div
                  class="flex items-center justify-between border-b border-indigo-100 px-4 pb-2"
                >
                  <h3 class="font-semibold">Edit Profile</h3>
                  <XMarkIcon
                    @click="isEditing = false"
                    class="size-8 cursor-pointer rounded p-1 text-red-500 hover:bg-red-500 hover:text-white"
                  />
                </div>
                <ProfileDetails />
              </div>
            </div>
            <Cog6ToothIcon
              class="size-8 rounded p-1 text-indigo-500 hover:bg-indigo-500 hover:text-white"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="flex h-96 gap-4">
      <div class="flex w-4/6 flex-col gap-2 rounded-xl bg-white">
        <h3 class="border-b border-indigo-100 px-4 py-2 font-semibold">
          About
        </h3>
        <p class="px-4 leading-relaxed">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat.
        </p>
      </div>
      <div class="flex w-2/6 flex-col gap-2 rounded-xl bg-white">
        <h3 class="border-b border-indigo-100 px-4 py-2 font-semibold">
          Friends
        </h3>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Cog6ToothIcon, XMarkIcon } from "@heroicons/vue/24/outline";
import { ref } from "vue";
import ProfileDetails from "./profilePage/ProfileDetails.vue";

const isEditing = ref(false);
</script>
