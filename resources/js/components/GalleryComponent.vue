<template>
    <div>
        <div class="gallery">
            <div class="gallery-item" v-for="(item, k) in getJson(items)" v-if="k < rowItems">
                    <div class="gallery-item-img" >
                            <img :src="'uploads/' + item.img" :alt="item.title">
                        <div class="gallery-item-txt">
                                <div class="gallery-item-header">
                                    <a :href="item.desc" rel="nofollow">{{ item.title }}</a>
                                </div>
                                <div class="gallery-item-link">
                                    <a :href="item.desc" rel="nofollow"><i class="fa-solid fa-link"></i></a>
                                </div>
                        </div>
                    </div>
             </div>

        </div>

        <div class="gallery-btn center">
            <a @click="clickButton($event)" class='btn' id='btn-gallery' href="#">{{textButton}}</a>
        </div>

    </div>
</template>

<script>
export default {
    name: "GalleryComponent",
    props: ['items'],
    mounted() {
        // this.consoleLog()
    },
    data: () => ({

        rowItems: 5,
        step: 5,
        textButton: 'Подгрузить',
        countAllItems: 0,
    }),
    methods: {
        // consoleLog: function() {
        //     console.log('дебагер: '+this.step)
        // },
        clickButton: function(e) {
            e.preventDefault();
            this.rowItems += this.step;
            this.countAllItems = this.countItems();

            console.log(this.rowItems, this.countAllItems);

            if (this.rowItems >= this.countAllItems) {
                this.textButton = 'Конец'
            }

        },
        countItems: function () {
            return this.countAllItems = this.getJson(this.items).length;
        },
        getJson: function (item) {
            return JSON.parse(item);
        },




    }
}
</script>

<style scoped>

</style>
