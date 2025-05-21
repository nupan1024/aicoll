<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue'
import Input from '@/components/ui/input/Input.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import InputError from '@/components/InputError.vue';


const props = defineProps({ 
    company: Object,
    status: Array
});
const company = usePage().props.company;
const status = usePage().props.status;

const form = useForm({
    name: company.name,
    address: company.address,
    phone_number: company.phone_number,
    status: company.status,
    _method: 'patch'
});

const updateCompany = () => {
    form.post(route('company.update', company.id), {
        forceFormData: true,
    });
};

</script>
<template>
    <MainLayout>
        <Head :title="$page.props.$t.companies.title" />

        <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded shadow">
            <form @submit.prevent="updateCompany" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.name }}</label>
                    <Input v-model="form.name" type="text" />
                    <InputError class="mt-2" :message="form.errors.name" />

                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.address }}</label>
                    <Input v-model="form.address" type="text" />
                    <InputError class="mt-2" :message="form.errors.address" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.phone_number }}</label>
                    <Input v-model="form.phone_number" type="text" />
                    <InputError class="mt-2" :message="form.errors.phone_number" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.status }}</label>
                    <select v-model="form.status" class="w-full border rounded p-2">
                        <option v-for="option in status" :key="option" :value="option">
                            {{ option }}
                        </option>                    
                    </select>
                    <InputError class="mt-2" :message="form.errors.status" />
                </div>
                <div class="mt-6 flex justify-end">
                    <a :href="route('dashboard')">
                        {{ $page.props.$t.companies.cancel }}
                    </a>
                    <Button class="ml-3" type="submit">
                        {{ $page.props.$t.companies.edit }}
                    </Button>
                </div>
            </form>
        </div>
    </MainLayout>
</template>