<template>

    <div class="top-tabs pb-40">


        <div class="container">
            <div class="top-tabs-desc center pb-20">
                <div class="top-tabs-header">
                    <h3>{{ moduleData.title }}</h3>
                </div>
                <div class="top-tabs-txt" v-html = "moduleData.desc">

                </div>
            </div>

            <ul class="top-tabs-items" v-for="item in itemsData" v-if="moduleData.types.id == item.type_id">

                <tabsItem :item="item"></tabsItem>

<!--                <li class="top-tabs-item">-->

<!--                    <div class="top-tabs-item-header" @click="openTab">-->
<!--                        <div class="top-tabs-item-title">{{ item.title }}</div>-->
<!--                        <div class="top-tabs-icon"><i class="fa fa-plus"></i></div>-->
<!--                    </div>-->

<!--                    <div class="top-tabs-item-txt" :class="{display: display}" v-html="item.content"></div>-->
<!--                </li>-->



            </ul>
        </div>


    </div>





</template>

<script>
import tabsItem from './top/topChild'

export default {
    name: "top",
    components: {
        tabsItem
    },
    props: [
        'items',
        'module'],


    computed: {
        //распарсивается json
        itemsData: function () {
            return JSON.parse(this.items);
        },
        moduleData: function () {
            return JSON.parse(this.module);
        },
    }
}
</script>

<style scoped>

</style>
