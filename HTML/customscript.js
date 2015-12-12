$(document).ready(function() {    
    //get session variable, if enabled remove disabled attr
    if (sessionStorage.getItem("retail-s") != null) {
        $("#select-retail").val(sessionStorage.getItem("retail-s"));
    }
    if (sessionStorage.getItem("store-e") == "enabled") {
        $("#select-store").removeAttr("disabled");
        $("#select-store").val(sessionStorage.getItem("store-s"));
    }
    if (sessionStorage.getItem("cat-e") == "enabled") {
        $("#select-cat").removeAttr("disabled");
        $("#select-cat").val(sessionStorage.getItem("cat-s"));
    }
    if (sessionStorage.getItem("item-e") == "enabled") {
        $("#select-item").removeAttr("disabled");
        $("#select-item").val(sessionStorage.getItem("item-s"));
    }
    if (sessionStorage.getItem("text-e") == "enabled") {
        $("#price").removeAttr("disabled");
        $("#quantity").removeAttr("disabled");
    }
    
    //option selected events, remove disabled and set session variable
    $("#select-retail").change(function() {
        $("#select-store").removeAttr("disabled");
        sessionStorage.setItem("store-e", "enabled");
        var selectedVal = $("#select-retail option:selected").val();
        sessionStorage.setItem("retail-s", selectedVal);
    });
    $("#select-store").change(function() {
        $("#select-cat").removeAttr("disabled");
        sessionStorage.setItem("cat-e", "enabled");
        var selectedVal = $("#select-store option:selected").val();
        sessionStorage.setItem("store-s", selectedVal);
    });
    $("#select-cat").change(function() {
        $("#select-item").removeAttr("disabled");
        sessionStorage.setItem("item-e", "enabled");
        var selectedVal = $("#select-cat option:selected").val();
        sessionStorage.setItem("cat-s", selectedVal);
    });
    $("#select-item").change(function() {
        $("#price").removeAttr("disabled");
        $("#quantity").removeAttr("disabled");
        sessionStorage.setItem("text-e", "enabled");
    });
    
    //click event clears session variables
    $("#clear-form").click(function() {
        sessionStorage.clear();
    });    
});

//$(window).unload(function() {
//  sessionStorage.clear(); 
//});