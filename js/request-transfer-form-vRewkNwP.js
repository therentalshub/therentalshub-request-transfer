var trhtrRequestForm=function(l){function r(){var r;"undefined"!=typeof trhtrApp&&(k="one",a=l("#trhrft_arv_date"),n=l("#trhrft_arv_time"),p=l("#trhrft_arv_pax"),o=l("#trhrft_arv_from"),u=l("#trhrft_arv_to"),i=l("#trhrft_arv_flight"),f=l("#trhrft_dpt_date"),d=l("#trhrft_dpt_time"),s=l("#trhrft_dpt_pax"),_=l("#trhrft_dpt_from"),h=l("#trhrft_dpt_to"),v=l("#trhrft_dpt_flight"),c=l("#trhrft_fname"),m=l("#trhrft_lname"),q=l("#trhrft_email"),y=l("#trhrft_phone"),b=l("#trhrft_notes"),j=l("#trhtr-request-form"),r={altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d",minDate:(new Date).fp_incr(1)},a.flatpickr(r),f.flatpickr(r),n.flatpickr(r={enableTime:!0,noCalendar:!0,dateFormat:"H:i",time_24hr:!0,minuteIncrement:5}),d.flatpickr(r),l(".trhtr-toggle-type-btn").on("click",function(){var r;r=l(this),l(".trhtr-toggle-type-btn").removeClass("active"),r.addClass("active"),"one"===r.data("type")?(k="one",f.prop("required",!1),d.prop("required",!1),s.prop("required",!1),_.prop("required",!1),h.prop("required",!1),l("#trhtr_dpt_wrap").css("display","none")):(k="return",f.prop("required",!0),d.prop("required",!0),s.prop("required",!0),_.prop("required",!0),h.prop("required",!0),l("#trhtr_dpt_wrap").css("display","block"))}),j.on("submit",function(r){var t,e;r.preventDefault(),t=j.find(":submit"),e=t.html(),t.html("Please wait..."),l("#trh-request-failed-alert").css("display","none"),l("#trh-request-success-alert").css("display","none"),l.post(trhrt_ajax_obj.ajax_url,{_ajax_nonce:trhrt_ajax_obj.nonce,action:"trhtr_submit_transfer_form",type:"one"===k?1:2,arvd:a.val(),arvt:n.val(),arvp:p.val(),arvfl:o.val(),arvtl:u.val(),arvf:i.val(),dptd:f.val(),dptt:d.val(),dptp:s.val(),dptfl:_.val(),dpttl:h.val(),dptf:v.val(),fname:c.val(),lname:m.val(),email:q.val(),phone:y.val(),notes:b.val()},function(r){t.html(e),Object.hasOwn(r,"error")?(l("#trhtr-request-failed-alert").css("display","block"),l(".trhtr-error-alert").html(r.error)):l("#trhtr-request-success-alert").css("display","block")})}))}var a=null,n=null,p=null,o=null,u=null,i=null,f=null,d=null,s=null,_=null,h=null,v=null,c=null,m=null,q=null,y=null,b=null,j=null,k=null;return{init:function(){r()}}}(jQuery,flatpickr);jQuery(document).ready(function(r){trhtrRequestForm.init()});