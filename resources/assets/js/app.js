
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import $ from 'jquery';
import 'datatables.net';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});


//Datatables 
$(function() {
    $('#users-table').DataTable({
      "pagingType": "simple"
    });
});

//Confirmation action button
$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
	e.preventDefault();
	var $form=$(this);
	$('#confirm').modal({ backdrop: 'static', keyboard: false })
	    .on('click', '#delete-btn', function(){
	        $form.submit();
	});
});

//Forms submit button is disabled if no action happen.
$(".profile-form input[type=submit]").attr('disabled','disabled');
// $("input[type=submit]").keyup(function(){
// $("input[type=submit]").removeAttr('disabled');
// });
$("input.form-control").click(function(){
$("input[type=submit]").removeAttr('disabled');
});


// Flassmessage Edit Profile
setTimeout(function() {
	$('#successMessage').fadeOut('fast');
}, 2000); // <-- time in milliseconds
	