<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import Modal from '@/components/Modal.vue'
import Button from '@/components/ui/button/Button.vue'
import Alert from '@/components/Alert.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import SearchForm from '@/components/SearchForm.vue';
import Pagination from '@/components/Pagination.vue';
import axios from 'axios';

const isOpenModal = ref(false);
const companyName = ref('');
const companyId = ref('');
const searchTerm = ref('');
const companies = ref([]);

const form = useForm({
    nit: '',
    name: '',
    address: '',
    phone_number: '',
});


const openModal = (e) => {
    companyName.value = e.target.dataset.name ?? "";
    companyId.value = e.target.dataset.id ?? "";

    isOpenModal.value = true;

};

const closeModal = (e) => {
    form.reset();
    isOpenModal.value = false;
};

const deleteCompany = () => {
    form.delete(route('company.delete', companyId.value), {
        forceFormData: true,
    });

    closeModal();
};

const searchCompanies = (text) => {
    searchTerm.value = text;

    loadCompanies(`${route('companies')}/?filter=${text}`);
}
const loadCompanies = (url = null) => {
    axios.get(url || route('companies')).then((response) => {
        companies.value = response.data;
                console.log(companies);

    }).catch((error) => {
        console.log(error);
    });
}

loadCompanies();

</script>
<template>
    <MainLayout>

    <Head :title=$page.props.$t.companies.title />

    <div v-if="$page.props.flash.message">
        <Alert :type="$page.props.flash.type" :message="$page.props.flash.message" />
    </div>

    <div class="flex items-center mb-4">
        <a :href="route('company.create')" class="hover:underline mr-4">
            {{ $page.props.$t.companies.create }}
        </a>
        <div class="flex-1"></div>
        <SearchForm @search="searchCompanies"/>
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white shadow-sm dark:bg-gray-900 dark:border-gray-700">
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
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700" v-if="companies?.data?.length > 0">
                <tr v-for="company in companies.data" :key="company.id" class="hover:bg-gray-50 dark:hover:bg-gray-800">
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.nit }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.name }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.address }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.phone_number }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ company.status }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <div class="flex items-center space-x-3">
                            <a :href="route('company.edit', company.id)" class="hover:underline">{{ $page.props.$t.companies.edit }}</a>
                            <a v-if="company.status === $page.props.$t.companies.inactive" :data-name="company.name" :data-id="company.id" href="#" @click="openModal" class="hover:underline">
                                {{ $page.props.$t.companies.delete }}
                            </a>
                        </div>    
                    </td>
                </tr>
            </tbody>
        </table>
        
        <!-- Responsive cards for mobile -->
        <div class="md:hidden space-y-4 p-4" v-if="companies?.data?.length > 0">
            <div v-for="company in companies.data" :key="company.id" class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:bg-gray-900 dark:border-gray-700">
                <div class="flex flex-col space-y-2">
                    <div><span class="font-semibold">{{ $page.props.$t.companies.nit }}:</span> {{ company.nit }}</div>
                    <div><span class="font-semibold">{{ $page.props.$t.companies.name }}:</span> {{ company.name }}</div>
                    <div><span class="font-semibold">{{ $page.props.$t.companies.address }}:</span> {{ company.address }}</div>
                    <div><span class="font-semibold">{{ $page.props.$t.companies.phone_number }}:</span> {{ company.phone_number }}</div>
                    <div><span class="font-semibold">{{ $page.props.$t.companies.status }}:</span> {{ company.status }}</div>
                    <div>
                        <a :href="route('company.edit', company.id)">{{ $page.props.$t.companies.edit }}</a>
                        <button v-if="company.status === $page.props.$t.companies.inactive" :data-name="company.name" :data-id="company.id" @click="openModal">{{ $page.props.$t.companies.delete }}</button>
                    </div>
                </div>
            </div>
        </div>

        <Pagination v-if="companies?.data?.length > 0" class="mt-6 mb-6" :links="companies.links"
            :filter="`&filter=${searchTerm}`" :click="loadCompanies"/>
    </div>

    <Modal :show="isOpenModal" @close="closeModal()">
        <template #default>
            <div class="p-6 dark:divide-gray-700">
                <h2 class="text-lg font-semibold mb-4">{{ $page.props.$t.companies.delete }}</h2>
                <p class="mt-4">{{ $page.props.$t.companies.msj_delete }} {{ companyName }}?</p>
                <div class="mt-6 flex justify-end">
                    <Button variant="secondary" @click="closeModal()" type="button">
                        {{ $page.props.$t.companies.cancel }}
                    </Button>
                    <Button variant="destructive" class="ml-3" @click="deleteCompany">
                        {{ $page.props.$t.companies.delete }}
                    </Button>
                </div>
            </div>
        </template>
    </Modal>
</MainLayout>

</template>