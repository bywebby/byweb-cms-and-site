<template>

    <li class="top-tabs-item">

    <div class="top-tabs-item-header" @click="openTab">
        <div class="top-tabs-item-title">{{ item.title }}</div>
        <div class="top-tabs-icon">
            <i class="fa fa-plus" v-if="!display"></i>
            <i class="fa fa-minus" v-else></i>
        </div>
    </div>

    <div class="top-tabs-item-txt" :class="{display: display}" v-html="item.content"></div>
    </li>

</template>

<script>
export default {
    name: "topChild",

    props: [
        'item',
    ],

    data: () => ({
        display: false,
    }),

    methods: {

        openTab: function ()  {
            return this.display = !this.display;
        }


    },

}
</script>

<style scoped>

</style>
