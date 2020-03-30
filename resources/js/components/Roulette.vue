<template>
    <div class="container">
    <div class="page-header" style="">
        <h1>

        </h1>
    </div>

    <div class="row">
        <div class="span3">
            <div class="roulette_container" >
                <div class="roulette" id="roulette1" style="display:none;">
                    <img src="../../../public/img/0.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/1.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/2.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/3.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/4.jpg" width="250px" height="250px"/>
                </div>
            </div>

            <div class="btn_container">
                <p>
                <button class="btn btn-large btn-primary" @click="start"> START </button>
                </p>
            </div>

        </div>
        <div class="span3">
            <div class="roulette_container" >
                <div class="roulette" id="roulette2" style="display:none;">
                    <img src="../../../public/img/0.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/1.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/2.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/3.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/4.jpg" width="250px" height="250px"/>

                </div>
            </div>


        </div>
        <div class="span3">
            <div class="roulette_container" >
                <div class="roulette" id="roulette3" style="display:none;">
                    <img src="../../../public/img/0.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/1.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/2.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/3.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/4.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/5.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/6.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/7.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/8.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/9.jpg" width="250px" height="250px"/>
                </div>
            </div>


        </div>
        <div class="span3">
            <div class="roulette_container" >
                <div class="roulette" id="roulette4"  style="display:none;">
                    <img src="../../../public/img/0.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/1.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/2.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/3.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/4.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/5.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/6.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/7.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/8.jpg" width="250px" height="250px"/>
                    <img src="../../../public/img/9.jpg" width="250px" height="250px"/>

                </div>
            </div>

        </div>
    </div>
</div>
</template>

<script>
    import Roulette from '../roulette.js'

    import JQuery from 'jquery'
    let $ = JQuery
    export default {
        data() {
            return {
                pluginName: 'roulette',
                memberId: '',

            }
        },
        mounted() {
            console.log('Component mounted.')

        },

        methods: {
            init() {

            },

            start() {
                var rouletter = $('div#roulette1');
                var rouletter2 = $('div#roulette2');
                var rouletter3 = $('div#roulette3');
                var rouletter4 = $('div#roulette4');
                rouletter.roulette('init')
                rouletter2.roulette('init')
                rouletter3.roulette('init')
                rouletter4.roulette('init')

                rouletter4.roulette({
                    speed : 50,
                    duration : 3,
                    stopImageNumber : 0,});
                rouletter2.roulette({
                    speed : 50,
                    duration : 6,
                    stopImageNumber : 0,
                    });

                rouletter3.roulette({
                    speed : 50,
                    duration : 9,
                    stopImageNumber : 0,
                });

                rouletter4.roulette({
                    speed : 50,
                    duration : 15,
                    stopImageNumber : 0,
                });

                rouletter.roulette('start');
                rouletter2.roulette('start');
                rouletter3.roulette('start');
                rouletter4.roulette('start');


            },


        },
    }
</script>
