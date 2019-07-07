<template>
    <div class="container">
        <div>
        test
            <transition name="fade-test">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>
console.log('test');
    export default{
    }
</script>
