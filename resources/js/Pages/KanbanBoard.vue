<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<script>
export default {
  
  props: {
    tasks:Array
  },
  data() {
    console.log(this.tasks)
    return {
      statuses: []
    };
  },
  mounted() {
    
    // 'clone' the statuses so we don't alter the prop when making changes
    this.statuses = JSON.parse(JSON.stringify(this.tasks));
  }
};
</script>
<template>
   <Head title="Dashboard" />
   <AuthenticatedLayout>
    hola
    <div class="relative p-2 flex overflow-x-auto h-full">
  
      <!-- Columns (Statuses) -->
      <div
        v-for="status in statuses"
        :key="status.slug"
        class="mr-6 w-4/5 max-w-xs flex-1 flex-shrink-0"
      >
        <div class="rounded-md shadow-md overflow-hidden">
          <div class="p-3 flex justify-between items-baseline bg-blue-800 ">
            <h4 class="font-medium text-white">
              {{ status.title }}
            </h4>
            <button class="py-1 px-2 text-sm text-orange-500 hover:underline">
              Add Task
            </button>
          </div>
          <div class="p-2 flex-1 flex flex-col h-full overflow-x-hidden overflow-y-auto bg-blue-100">
  
            <!-- Tasks -->
            <div
              v-for="task in status.tasks"
              :key="task.id"
              class="mb-3 p-3 h-24 flex flex-col bg-white rounded-md shadow transform hover:shadow-md cursor-pointer"
            >
              <span class="block mb-2 text-xl text-gray-900">
                {{ task.title }}
              </span>
              <p class="text-gray-700 truncate">
                {{ task.description }}
              </p>
            </div>
            <!-- ./Tasks -->
  
            <!-- No Tasks -->
            <div
              v-show="!status.tasks.length"
              class="flex-1 p-4 flex flex-col items-center justify-center"
            >
              <span class="text-gray-600">No tasks yet</span>
              <button
                class="mt-1 text-sm text-orange-600 hover:underline"
              >
                Add one
              </button>
            </div>
            <!-- ./No Tasks -->
          </div>
        </div>
      </div>
      <!-- ./Columns -->
  
    </div>
  </AuthenticatedLayout>
  </template>
  
