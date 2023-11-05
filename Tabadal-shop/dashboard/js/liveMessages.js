let currentMesNum = $("#mesNum").html();
var intervalId = window.setInterval(function(){
    $.post("functions/messages/number.php", {}, function(mesNum){
        if(mesNum > +currentMesNum){
            $("#mesNum").html(mesNum);
            $.post("functions/messages/recentMessages.php", {}, function(recentMessages){
                $("div[aria-labelledby=messagesDropdown]").html(recentMessages["name"])
            });
        }
    });
}, 1000)