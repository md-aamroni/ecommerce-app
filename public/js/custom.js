"use strict";

//Uploaded Image Reader
function readURL(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      var div_id = $(input).attr('set-to');
      reader.onload = function (e) {
         $('#' + div_id).attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
   }
}


$(document).ready(function () {

   let address = location.href;
   address = address.split("/").slice(0, -1).join("/");

   //Current DateTime
   const currentDate = function startTime() {
      let days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
         'October', 'November', 'December'];

      let today = new Date();
      let h = today.getHours();
      let m = today.getMinutes();
      let s = today.getSeconds();
      let year = today.getFullYear();
      let month = months[today.getMonth()];
      let day = days[today.getDay()];
      let date = today.getDate();
      let ampm = h >= 12 ? 'pm' : 'am';

      h = (h % 12) || 12;
      m = checkTime(m);
      s = checkTime(s);

      let times = month + ", " + date + " " + year + " " + h + ":" + m + ":" + s + " " + ampm;

      if (location.href !== (address + '/admin') || location.href !== (address + '/forgot') || location.href !== (address + '/reset')) {
         $('#time').html(times);
      }
      setTimeout(function () {
         startTime()
      }, 500);
   }

   function checkTime(i) {
      if (i < 10) {
         i = "0" + i;
      }
      return i;
   }
   currentDate();



   //Image Preview
   $(".default").change(function () {
      readURL(this);
   });


   //Window Refresh
   $(document).on('click', '#refreshWindow', function () {
      window.location.reload();
   });


   //Hide Custom Alert
   setTimeout(function () {
      $('.customAlert').hide();
   }, 7000);


   //Uploaded File Name
   $(document).on('change', '.imageFile', function (event) {
      let file = event.target.files[0];
      $('.fileName').html(file.name + ' <span class="text-success">is uploaded</span>');
   });


   //Confirm Form ReSubmission Prevention
   if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
   }
});
