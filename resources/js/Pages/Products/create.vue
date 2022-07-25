<template>
    <Head title="Products" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products Create
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex m-2 p-2">
                    <Link
                        href="/products/"
                        class="bg-indigo-500 text-white rounded px-4 py-2"
                        >Back</Link
                    >
                </div>
                <div class="flex flex-col">
                    <div
                        class="block p-6 rounded-lg shadow-lg bg-white max-w-sm"
                    >
                        <form @submit.prevent="productStore">
                            <div class="form-group mb-6">
                                <label
                                    for="exampleInputEmail2"
                                    class="form-label inline-block mb-2 text-gray-700"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                />
                            </div>
                            <div class="form-group mb-6">
                                <label
                                    for="exampleInputPassword2"
                                    class="form-label inline-block mb-2 text-gray-700"
                                    >Image</label
                                >
                                <input
                                    type="file"
                                    @input="form.image = $event.target.files[0]"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                />
                            </div>
                            <button
                                type="submit"
                                class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                            >
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    image: null,
});

function productStore() {
    form.post("/products");
}
</script>
