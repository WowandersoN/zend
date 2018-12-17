Vue.component('custom-tag', {
    template: '<li>{{todo.text}}</li>',
    props: ['todo']

});


var vm = new Vue({
    el: '#vue-container',
    data: {
        message: 'test',
        seen: false,
        groceryList: [
            { id: 0, text: '123' },
            { id: 1, text: '1sasd' },
            { id: 2, text: 'ddssa' }
        ]
    },
    methods:{
        reverseMessage: function () {
            console.log('asd');
            return this.message.split('').reverse().join('')
        }
    },
    computed: {
        // геттер вычисляемого значения
        reversedMessage: function () {
            // `this` указывает на экземпляр vm
            console.log('test');

            return this.message.split('').reverse().join('')
        }
    }


});
