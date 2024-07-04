<script setup>
const {text, isOwn} = defineProps(['text', 'isOwn'])
</script>

<template>
    <div :class="['p-2 rounded-md border border-gray-200 w-max', isOwn ? 'bg-violet-200 rounded-bl-none self-start' : 'rounded-br-none self-end']">
        <p class="text-xs max-w-[50vw]">{{text}}</p>
    </div>
</template>

<style scoped lang="postcss">

</style>
