 
alert('haio');
var api_key = '54f297aa644bf4f27044771fc75cbb64';
function change_section_tv(evt, name, type='tv') {
  alert(type);
 var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("common");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("current_tab", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " current_tab";
    if(name != 'summary')
    window[name];

}