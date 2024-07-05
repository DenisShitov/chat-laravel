<script setup>
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import {useForm, usePage} from "@inertiajs/vue3";

const page = usePage()
const message = useForm({
    text: null,
})

const send = () => {
    message.post(route('send-message', {user: page.props.receiver}))
    message.text = null
}
</script>

<template>
    <form class="w-full flex items-center gap-4" @submit.prevent="send">
        <Textarea class="w-full" autoResize rows="1" v-model="message.text" />
        <Button icon="pi pi-arrow-right" type="submit"/>
    </form>
</template>

