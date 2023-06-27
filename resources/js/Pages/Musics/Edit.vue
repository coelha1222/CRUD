<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";


const props = defineProps({
    music: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
  id: props.music ? props.music.id : null,
  name: props.music ? props.music.name : null,
  artist: props.music ? props.music.artist : null,
  album: props.music ? props.music.album : null,
});

const submit = () => {
  if (props.music && props.music.id) {
    form.put(route("musics.update", props.music.id));
  }
};
</script>

<template>
    <Head title="Music Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Music Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    name="title"
                                    class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="Artist"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700"
                                    >Artist</label
                                >
                                <input
                                    type="text"
                                    v-model="form.artist"
                                    name="title"
                                    class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Artista"
                                />
                                <div
                                    v-if="form.errors.artist"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.artist }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="artist"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700"
                                    >Album</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.album"
                                    name="title"
                                    id=""
                                    class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.album"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.album }}
                                </div>
                            </div>
                            <Button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Submit
                            </Button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>