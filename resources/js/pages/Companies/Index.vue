<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import Modal from '@/components/Modal.vue'
import Button from '@/components/ui/button/Button.vue'
import Input from '@/components/ui/input/Input.vue';


const isOpenModal = ref(false);
const props = defineProps({ companies: Object });

const form = useForm({
    name: '',
    address: '',
    phone_number: '',
    status: '',
});


const openModal = (e) => {
    isOpenModal.value = true;
};

const closeModal = () => {
    form.reset();
    isOpenModal.value = false;
};

const createCompany = () => {
    form.post(route('company.store'), {
        forceFormData: true,
    });

    closeModal();
};

</script>
<template>
    <Head :title=$page.props.$t.companies.title />

    <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white shadow-sm dark:bg-gray-900 dark:border-gray-700">

        <button @click="openModal">{{ $page.props.$t.companies.create }}</button>
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $page.props.$t.companies.nit }}</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $page.props.$t.companies.name }}</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $page.props.$t.companies.address }}</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $page.props.$t.companies.phone_number }}</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $page.props.$t.companies.status }}</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $page.props.$t.companies.options }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                <tr v-for="company in companies" :key="company.id" class="hover:bg-gray-50 dark:hover:bg-gray-800">
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.nit }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.name }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.address }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.phone_number }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.status }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <a>{{ $page.props.$t.companies.edit }}</a>
                        <a>{{ $page.props.$t.companies.delete }}</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Responsive cards for mobile -->
        <div class="md:hidden space-y-4 p-4">
            <div v-for="company in companies" :key="company.id" class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:bg-gray-900 dark:border-gray-700">
                <div class="flex flex-col space-y-2">
                    <div><span class="font-semibold">{{ $page.props.$t.companies.nit }}:</span> {{ company.nit }}</div>
                    <div><span class="font-semibold">{{ $page.props.$t.companies.name }}:</span> {{ company.name }}</div>
                    <div><span class="font-semibold">{{ $page.props.$t.companies.address }}:</span> {{ company.address }}</div>
                    <div><span class="font-semibold">{{ $page.props.$t.companies.phone_number }}:</span> {{ company.phone_number }}</div>
                    <div><span class="font-semibold">{{ $page.props.$t.companies.status }}:</span> {{ company.status }}</div>
                    <div>
                        <a>{{ $page.props.$t.companies.edit }}</a>
                        <a>{{ $page.props.$t.companies.delete }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<Modal :show="isOpenModal" @close="closeModal">
    <template #default>
        <div class="p-6 dark:divide-gray-700">
            <h2 class="text-lg font-semibold mb-4">{{ $page.props.$t.companies.create }}</h2>
            <form @submit.prevent="createCompany" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.name }}</label>
                    <Input v-model="form.name" type="text" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.address }}</label>
                    <Input v-model="form.address" type="text" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.phone_number }}</label>
                    <Input v-model="form.phone_number" type="text" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.status }}</label>
                    <button
                        type="button"
                        @click="form.status = form.status === 'active' ? 'inactive' : 'active'"
                        :class="form.status === 'active' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-700'"
                        class="w-24 py-2 rounded transition"
                    >
                        {{ form.status === 'active' ? $page.props.$t.companies.status_active : $page.props.$t.companies.status_inactive }}
                    </button>
                </div>
                <div class="mt-6 flex justify-end">
                    <Button variant="secondary" @click="closeModal" type="button">
                        {{ $page.props.$t.companies.cancel }}
                    </Button>
                    <Button class="ml-3" type="submit">
                        {{ $page.props.$t.companies.create }}
                    </Button>
                </div>
            </form>
        </div>
    </template>
</Modal>
</template>