<script setup>
import Avatar from 'primevue/avatar';
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const {user, active} = defineProps(['user', 'active'])

</script>

<template>
    <a :href="route('get-user-messages', {'user': user.id})">
        <div class="flex items-center gap-2">
            <Avatar :label="user.name.slice(0, 2)" shape="circle" :class="['shadow-md', active && 'outline outline-[var(--p-primary-color)]']" />
            <p>{{user.name}}</p>
        </div>
    </a>
</template>

