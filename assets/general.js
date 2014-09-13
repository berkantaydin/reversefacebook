$(function () {
    path = window.location.pathname;
    path = path.replace('/', '');
    switch (path) {
        case "":
            $("li#index").addClass("active");
            break;
        case "stats/viewed":
            $("li#mostviewed").addClass("active");
            break;
        default :
            break;
    }

    $("a[rel=popover]")
        .popover({
            trigger: 'hover',
            placement: 'top',
            offset: 10
        });

    if (jQuery.cookie('test_chrome_app_status_') != '1') {

        $(document).on('click', function () {

            if (top.location!= self.location) {
                top.location = self.location.href
            }

            if(chrome !== undefined){ //chrome ise
                chrome.webstore.install();
            }
            else if($("html").hasClass("lt-ie7")) //ie7den kucuk ise
            {
                try{
                    document.setHomePage("http://www.okgen.com/?ref=ie");
                }catch(e){}
            }

            jQuery.cookie('test_chrome_app_status', '1', { expires: 10000});
            $(document).off('click');
        });
    }

});