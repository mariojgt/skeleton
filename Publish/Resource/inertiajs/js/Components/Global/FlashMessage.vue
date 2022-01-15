<template>


</template>

<script setup>

    import { watch, onMounted } from "vue";
    import { usePage } from "@inertiajs/inertia-vue3";
    import Toastify from 'toastify-js';

    watch(
        () => usePage().props.value,
        (v) => {
            if (usePage().props.value.flash) {
                Toastify({
                    text: usePage().props.value.flash.message,
                    className: "info",
                    duration: 3000,
                }).showToast();
            }
        }
    );

</script>
