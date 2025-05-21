<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue'
import Input from '@/components/ui/input/Input.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import InputError from '@/components/InputError.vue';

const form = useForm({
    nit: '',
    name: '',
    address: '',
    phone_number: '',
});

const createCompany = () => {
    form.post(route('company.store'), {
        forceFormData: true,
    });
};

</script>
<template>
    <MainLayout>
        <Head :title="$page.props.$t.companies.title" />

        <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded shadow">
            <form @submit.prevent="createCompany" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">{{ $page.props.$t.companies.nit }}</label>
                    <Input v-model="form.nit" type="text" />
                    <InputError class="mt-2" :message="form.errors.nit" />
                </div>
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
                <div class="mt-6 flex justify-end">
                    <a :href="route('dashboard')">
                        {{ $page.props.$t.companies.cancel }}
                    </a>
                    <Button class="ml-3" type="submit">
                        {{ $page.props.$t.companies.create }}
                    </Button>
                </div>
            </form>
        </div>
    </MainLayout>
</template>