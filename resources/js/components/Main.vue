<template>
    <transition name="fade" mode="out-in">
        <router-view></router-view>
    </transition>
</template>

<script>
export default {
    name:'Main',
    data(){
        return {
        }
    },

}
</script>

<style lang="scss" scoped>
main{
    background-color:#000000 ;
    min-height:100vh;
    width: 100%;
    overflow: hidden;
}

/* .fade-enter-active,
.fade-leave-active{
  transition: opacity 0.1s;
}

.fade-enter,
.fade-leave-to{
  opacity: 0;
} */


</style>