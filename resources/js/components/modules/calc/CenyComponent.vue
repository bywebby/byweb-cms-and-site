<template>
    <section class="row">
        <a id="cena"></a>
        <div class="calc">

            <!--заголовок модуля -->
            <h2>
                {{getModuleTitle}}
            </h2>
        </div>
        <!--описание модуля -->
        <div v-if="getModuleDesc" class="calc-desc">
            {{getModuleDesc}}
        </div>

        <div class="calc-row">
            <div class="calc-item" v-for="(item, titleKey) in items" v-if="(typeof item === 'object') && (item !=null)" >
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
    props: [
        'calcitems',
    ],
    computed: {
        //распарсивается json
        items: function () {
            return JSON.parse(this.calcitems);
        },
        getModuleTitle: function () {
            return this.items['module-title']
        },
        getModuleDesc: function () {

            console.log(this.items["module-desc"]);

            if(!this.items["module-desc"] && this.items["module-desc"] != null)  {
                return false;
            };

            return this.items["module-desc"]



        }
    }

}
</script>

<style scoped>

</style>
