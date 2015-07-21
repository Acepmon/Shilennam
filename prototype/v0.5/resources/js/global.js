$(document).ready(function () {

    $("button").click(function() {
        if ($(this).attr("data-toggle") === "modal") {
            var id = $(this).attr("id").split("_");
            if (id[0] === "party") {
                if (id[1] === "edit") {
                    $.post("../backend/Editor.php", {action : "party_edit_get", party_record_id : id[2]}, function(data) {
                        var out = data.split("::");
                        var code, title, acronym;
                        code = out[0];
                        title = out[1];
                        acronym = out[2];
                        $("#edit_party_code").attr("value", code);
                        $("#edit_party_title").attr("value", title);
                        $("#edit_party_acronym").attr("value", acronym);
                    });
                }
            }
        }
    });
    
    $(".party_edit_valid").click(function() {
        var next = $(this).next();
        next.prop('readonly', !next.prop('readonly'));
    });
    
    var side_menu_list = [
        {icon : "<span class='glyphicon glyphicon-menu-left'></span>", text : "Collapse menu"},
        {icon : "<span class='glyphicon glyphicon-book'></span>", text : "Instructions"},
        {icon : "<span class='glyphicon glyphicon-list-alt'></span>", text : "Diagrams"},
        {icon : "<span class='glyphicon glyphicon-pencil'></span>", text : "Table Editor"},
        {icon : "<span class='glyphicon glyphicon-file'></span>", text : "Data Viewer"},
        {icon : "<span class='glyphicon glyphicon-user'></span>", text : "User Priviligies"},
    ];
    var side_menu_collapsed = false;
    $("#collapse_side_menu").click(function() {
        var parent = $("#"+$(this).attr("data-parent"));
        if (side_menu_collapsed) {
            side_menu_collapsed = false;
        } else {
            side_menu_collapsed = true;
        }
    });

});