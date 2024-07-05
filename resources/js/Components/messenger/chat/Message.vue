<script setup>
const {text, isOwn} = defineProps(['text', 'isOwn'])
</script>

<template>
    <div :class="['py-2 px-4 rounded-md max-w-1/2', !isOwn ? 'rounded-bl-none self-start bg-[var(--p-surface-50)]' : 'rounded-br-none self-end bg-[var(--p-primary-color)] text-[var(--p-primary-contrast-color)]']">
        <p class="text-xs">{{text}}</p>
    </div>
</template>

<style scoped lang="postcss">

</style>
