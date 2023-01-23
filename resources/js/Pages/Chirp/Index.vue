<script setup>
import Chirp from '@/Components/Chirp.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    message: "",
})

defineProps(['chirps'])
</script>

<template>

    <Head title="Chirps" />

    <AuthenticatedLayout>
        <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                          v-model="form.message"
                          placeholder="What's on your mind?"></textarea>
                <InputError class="mt-2"
                            :message="form.errors.message" />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <Chirp v-for="chirp in chirps"
                       :key="chirp.id"
                       :chirp="chirp" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
