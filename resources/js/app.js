/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.globEager('./**/*.vue')).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');


//==========================//
//          CARDS           //
//==========================//
let checkeds = document.querySelectorAll(".mealCheck");
let submitOrder = document.querySelector(".submitOrder");


checkeds.forEach(checked => {
    checked.addEventListener('change', () => {

        checked.closest('.c-card').classList.toggle('selecteds');
        let mealOrders = document.querySelectorAll(".selecteds");
        if (mealOrders.length >= 3 && mealOrders.length <= 5) {
            submitOrder.disabled = false;
        }
        if (mealOrders.length < 3 || mealOrders.length > 5) {
            submitOrder.disabled = true;
        }
    })
});

//==========================//
//        ALLERGIES         //
//==========================//

let allergieRadio = document.querySelector("#restrictionCheckbox");
let allergieTextArea = document.querySelector("#restrictionTextArea");

if (allergieRadio !== null) {
    allergieRadio.addEventListener('change', () => {
        if (allergieRadio.checked) {
            allergieTextArea.classList.remove('d-none');
        }
        else {
            allergieTextArea.classList.add('d-none');
        }
    })
}

//==========================//
//    STATUS DE COMMANDE    //
//==========================//

let orderInputs = document.querySelectorAll(".statusSelect");

if (orderInputs !== null) {
    for (let x = 0; x < orderInputs.length; x++)
        orderInputs[x].addEventListener('change', submitOrderStatus);
}

function submitOrderStatus($event) {
    this.value = event.target.value;
    this.form.submit();
}


//==========================//
//         PORTIONS         //
//==========================//

let errorPortion = document.querySelector(".errorPortion")
let submitButton = document.querySelector("#orderNow > input")
if (submitButton !==null) {
    submitButton.addEventListener('click', () => {
        errorPortion.classList.toggle('d-none');
    });

}