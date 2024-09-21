$(function () {
    const editableButtons = `
        <button type="submit" class="btn btn-success editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>
        <button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect waves-light"><i class="mdi mdi-close"></i></button>
    `;

    const usernameConfig = {
        type: "text",
        pk: 1,
        name: "username",
        title: "Enter username",
        mode: "inline",
        inputclass: "form-control-sm"
    };

    const firstNameConfig = {
        validate: function (e) {
            if ("" === $.trim(e)) return "This field is required"
        },
        mode: "inline",
        inputclass: "form-control-sm"
    };

    const sexConfig = {
        prepend: "not selected",
        mode: "inline",
        inputclass: "form-select form-select-sm",
        source: [
            {value: 1, text: "Male"},
            {value: 2, text: "Female"}
        ],
        display: function (t, e) {
            var n = $.grep(e, function (e) {
                return e.value === t
            });
            n.length ? $(this).text(n[0].text).css("color", {
                "": "#98a6ad",
                1: "#5fbeaa",
                2: "#5d9cec"
            }[t]) : $(this).empty();
        },
    };

    const groupConfig = {
        showbuttons: false,
        mode: "inline",
        inputclass: "form-select form-select-sm"
    };

    const dobConfig = {mode: "inline", inputclass: "form-select form-select-sm"};

    const commentsConfig = {showbuttons: "bottom", mode: "inline", inputclass: "form-control-sm"};

    $.fn.editableform.buttons = editableButtons;
    $("#inline-username").editable(usernameConfig);
    $("#inline-firstname").editable(firstNameConfig);
    $("#inline-sex").editable(sexConfig);
    $("#inline-group").editable(groupConfig);
    $("#inline-dob").editable(dobConfig);
    $("#inline-comments").editable(commentsConfig);
});
