<template>
  <transition name="fade">
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
      <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg w-full max-w-lg mx-4 relative">
        <button
          class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200"
          @click="$emit('close')"
          aria-label="Cerrar"
        >
          &times;
        </button>
        <slot />
      </div>
    </div>
  </transition>
</template>

<script setup>
defineProps({
  show: {
    type: Boolean,
    required: true
  }
});
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>