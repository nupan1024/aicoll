<script setup>
const emit = defineEmits(['search']);
const props = defineProps({ message: String });

const search = (e) => {
    emit('search', e.target.value)
};
</script>

<template>
    <form class="py-3 px-4 flex items-center">
        <label class="sr-only">{{ $page.props.$t.companies.search }}</label>
        <div class="relative w-full tooltip tooltip-left" :data-tip="props.message">
            <input type="text" @input="search" :placeholder="$page.props.$t.companies.search" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg">
        </div>
    </form>
</template>