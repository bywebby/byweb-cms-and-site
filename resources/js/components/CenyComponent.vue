<template>
<div class="ceny">
    <div class="ceny-item" v-for="(item, k) in JSON.parse(items)">

        <a :href="item.description">
            <h4>{{item.title}}</h4>
        </a>

        <div class="ceny-descprice" v-html="item.content">




<!--            <label><input type="checkbox" value="50" name="pay1_2" class="pay" checked="">Создание дизайна</label><br>-->
<!--            <label><input type="checkbox" value="30" name="pay1_3" class="pay" checked="">Наполнение</label><br>-->

<!--            <hr>-->
<!--            <p><b>Установка и настройка системы управления CMS:</b></p>-->
<!--            <label><i class="joomla"></i><input type="radio" value="150" name="pay1_1" class="pay" checked="">Joomla</label><br>-->
<!--            <label><i class="wp"></i><input type="radio" value="190" name="pay1_1" class="pay">WordPress</label><br>-->
<!--            <label><i class="bitrix"></i><input type="radio" value="900" name="pay1_1" class="pay">1c-Битрикс</label><br>-->
<!--            <label><i class="laravel"></i><input type="radio" value="1200" name="pay1_1" class="pay">Фреймворк Laravel</label><br>-->
<!--            <label><i class="php"></i><input type="radio" value="1700" name="pay1_1" class="pay">Нативный PHP</label>-->

<!--            <hr>-->
<!--            <p><b>Веб-сервер:</b></p>-->
<!--            <label><input type="checkbox" value="12.7" name="pay1_5" class="pay">Доменное имя</label><br>-->
<!--            <label><input type="checkbox" value="3" name="pay1_6" class="pay">Хостинг на месяц</label>-->

        </div>
        <div data-aos="fade-up-right" class="price" id="pay_price"></div>
    </div>
</div>









</template>

<script>
export default {
    name: "CenyComponent",
    props: ['items']
}
</script>

<style scoped>

</style>
