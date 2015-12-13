$(document).ready(function() {    
    //get session variable
    //if dropdown was enabled, remove disabled attr
    if (sessionStorage.getItem("retail-disabled") == "true") {
        $("#sel-retail").prop("disabled", true);
    }
    if (sessionStorage.getItem("store-disabled") == "false") {
        $("#sel-store").removeAttr("disabled");
    }
    if (sessionStorage.getItem("cat-disabled") == "false") {
        $("#sel-cat").removeAttr("disabled");
    }
    if (sessionStorage.getItem("item-disabled") == "false") {
        $("#sel-item").removeAttr("disabled");
    }
    if (sessionStorage.getItem("text-disabled") == "false") {
        $("#txt-price").removeAttr("disabled");
        $("#txt-quantity").removeAttr("disabled");
    }
    //if an item was selected, get selected value
    if (sessionStorage.getItem("retail-val") != null) {
        $("#sel-retail").val(sessionStorage.getItem("retail-val"));
    }
    if (sessionStorage.getItem("store-val") != null) {
        $("#sel-store").val(sessionStorage.getItem("store-val"));
    }
    if (sessionStorage.getItem("cat-val") != null) {
        $("#sel-cat").val(sessionStorage.getItem("cat-val"));
    }
    if (sessionStorage.getItem("item-val") != null) {
        $("#sel-item").val(sessionStorage.getItem("item-val"));
    }

    
    //option selected events
    //remove disabled from next dropdown, disable current dropdown
    //set session variables, set selected value
    //submit form to php script
    $("#sel-retail").change(function() {
        sessionStorage.setItem("retail-disabled", "true");
        sessionStorage.setItem("store-disabled", "false");
        var selectedVal = $("#sel-retail option:selected").val();
        sessionStorage.setItem("retail-val", selectedVal);
        $(this).closest("form").submit();
    });
    $("#sel-store").change(function() {
        sessionStorage.setItem("store-disabled", "true");
        sessionStorage.setItem("cat-disabled", "false");
        var selectedVal = $("#sel-store option:selected").val();
        sessionStorage.setItem("store-val", selectedVal);
        $(this).closest("form").submit();
    });
    $("#sel-cat").change(function() {
        sessionStorage.setItem("cat-disabled", "true");
        sessionStorage.setItem("item-disabled", "false");
        var selectedVal = $("#sel-cat option:selected").val();
        sessionStorage.setItem("cat-val", selectedVal);
        $(this).closest("form").submit();
    });
    $("#sel-item").change(function() {
        $("#txt-price").removeAttr("disabled");
        $("#txt-quantity").removeAttr("disabled");
        sessionStorage.setItem("text-disabled", "false");
    });
    
    
    //clicking 'Clear Form' clears session variables
    $("#btn-clear-form").click(function() {
        sessionStorage.clear();
        location.reload();
    });
    
    
    //add button clicked
    $("#btn-add-item").click(function() {
        
    });
    
    
    //remove button clicked
    $("#btn-remove-item").click(function() {
        
    });
});