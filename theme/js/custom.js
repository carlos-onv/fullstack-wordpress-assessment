(function ($) {
    $(document).ready(function () {
        console.log('Ready');
        // Include jquery functions calls to manipulate the elements inside widgets
        // <ul>, <li>, and <a>
        // using as a selector the class default-sidebar
        $('#mainbody-widget-area-1 ul').addClass('list-group');
        $('#mainbody-widget-area-1 ul li').addClass('list-group-item');
        $('#mainbody-widget-area-1 ul li a').addClass('list-group-item-action');
        console.log('Ready2');
    });
})(jQuery)

function goToPost(permalink) { 
    window.location.href = permalink;
}