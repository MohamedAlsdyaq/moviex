function get_year(e){
  e = e.split("-");
  return e[0];
}

function go_to_page(href){
 
    
}
function NavSearch(){
    $('.navs').hide();
    $('#search_container').css('width', '350px;');
}
   $('.search').mouseleave(function(e){
  alert('g');
     $('.navs').fadeIn();
   });   

function up(e) {
  max = $(e).attr('data-limit');
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
    if (document.getElementById("myNumber").value >= parseInt(max)) {
        document.getElementById("myNumber").value = max;
    }
}
function down(min) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
    if (document.getElementById("myNumber").value <= parseInt(min)) {
        document.getElementById("myNumber").value = min;
    }
}

function check(text) {

    toastr["success"]('<h5>'+text+'</h5>');
                
    }
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function danger(text) {

    toastr["warning"]('<h5>'+text+'</h5>');
                
    }
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function info(text) {

    toastr["info"]('<h5>'+text+'</h5>');
                
    }
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

function limit(e){
  var name = $(e).attr('data-name');

    var tval = $(e).val(),
        tlength = tval.length,
        set = 140,
        remain = parseInt(set - tlength);
    $('#'+name).text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $(e).val((tval).substring(0, tlength - 1))
    }
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction(i) {
    document.getElementById("myDropdown"+i).classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 


function link_img_click(e){
  $('.active_social').removeClass('active_social');
  $(e).addClass('active_social');

  $('#indicator').html('Enter your '+$(e).attr('data-id')+' username below to add a link to your profile.');
  $('#link_input').attr('placeholder', 'Your'+$(e).attr('data-id')+ ' username');





 }