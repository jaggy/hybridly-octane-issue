<script setup lang="ts">
const one = useProperty('one')
const two = useProperty('two')

const lazyOne = useProperty('lazyOne')
const lazyTwo = useProperty('lazyTwo')
</script>

<template>
    <div>one: {{ one }}</div>
    <div>two: {{ two }}</div>

    <div>lazyOne: {{ lazyOne }}</div>
    <div>lazytwo: {{ lazyTwo }}</div>
</template>

<style scoped>

</style>
