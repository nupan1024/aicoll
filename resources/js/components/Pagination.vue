<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap mt-8 justify-center">
            <template v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded"
                    v-html="link.label"
                />

                <button v-else-if="filter"
                        @click="click(link.url + filter)"
                        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded"
                        :class="{ 'bg-primary text-black': link.active }"
                        v-html="link.label"
                />
                <button v-else
                        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded"
                        :class="{ 'bg-primary text-black': link.active }"
                        @click="click(link.url)" v-html="link.label"/>
            </template>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    links: Array,
    filter: String,
    click: Function
});

const components = {
    Link,
};

</script>