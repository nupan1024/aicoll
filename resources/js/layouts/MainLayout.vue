<script>
</script>
<template>
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow px-6 py-4 flex items-center justify-between">
      <div class="text-xl font-bold text-gray-800 dark:text-white">
       
      </div>
      <ul class="flex space-x-6">
        <li><a href="/" class="text-gray-700 dark:text-gray-200 hover:underline">Companies</a></li>
      </ul>
    </nav>
    <!-- Content centered -->
    <main class="flex-1 flex items-center justify-center">
      <div class="w-full max-w-9/10 p-6">
        <slot />
      </div>
    </main>
  </div>
</template>