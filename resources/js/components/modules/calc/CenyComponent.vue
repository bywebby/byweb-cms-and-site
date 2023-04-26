<template>
    <section class="row">
        <div class="calc">
            <!--заголовок модуля -->
            <h2>
                {{getModuleTitle}}
            </h2>
        </div>
        <!--описание модуля -->
        <div class="calc-desc">
            {{getModuleDesc}}
        </div>

        <div class="calc-row">
            <div class="calc-item" v-for="(item, titleKey) in items" v-if="typeof item === 'object'" >
                <calcItem :item="item" :titleKey="titleKey" />
            </div>
        </div>
    </section>


</template>

<script>
import calcItem from './CalcItemComponent'
export default {
    name: "CenyComponent",
    components: {
        calcItem
    },
    //входной json
    props: ['calcitems'],
    computed: {
        //распарсивается json
        items: function () {
            return JSON.parse(this.calcitems);
        },
        getModuleTitle: function () {
            return this.items['module-title']
        },
        getModuleDesc: function () {
            return this.items["module-desc"]
        }
    }

}
</script>

<style scoped>

</style>
