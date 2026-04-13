// active and open dropdown menu if child is active
$(function () {
    $(".nav-treeview .nav-link.active")
        .parents(".nav-item")
        .addClass("menu-open");
    $(".nav-treeview .nav-link.active")
        .parents(".nav-item")
        .children("a")
        .addClass("active");

    $(".nav-item").on("click", function () {
        // Close other open menus
        $(".nav-item").not(this).removeClass("menu-open");
        $(".nav-treeview")
            .not($(this).find(".nav-treeview"))
            .css("display", "none");
    });
});

$("form").parsley();

$(".select2").select2({
    allowClear: true,
});

var letters = /^[A-Za-z\s]+$/;
var digits = /^[0-9]+$/;
var numbers = /^[0-9.]+$/;
$(".letters-input").on("keypress", function (event) {
    var key = String.fromCharCode(event.which);
    if (!letters.test(key)) {
        event.preventDefault();
    }
});
$(".letters-input").on("input", function () {
    var value = $(this).val();
    if (!letters.test(value)) {
        $(this).val(value.replace(/[^A-Za-z\s]/g, ""));
    }
});

$(".digits-input").on("keypress", function (event) {
    var key = String.fromCharCode(event.which);
    if (!digits.test(key)) {
        event.preventDefault();
    }
});
$(".digits-input").on("input", function () {
    var value = $(this).val();
    if (!digits.test(value)) {
        $(this).val(value.replace(/[^0-9]/g, ""));
    }
});

$(".numbers-input").on("keypress", function (event) {
    var key = String.fromCharCode(event.which);
    if (!numbers.test(key)) {
        event.preventDefault();
    }
});
$(".numbers-input").on("input", function () {
    var value = $(this).val();
    if (!numbers.test(value)) {
        $(this).val(value.replace(/[^0-9.]/g, ""));
    }
});

$('input[type="file"]').on("change", function (e) {
    var fileName = e.target.files[0].name;
    $(this).next(".custom-file-label").html(fileName);
});

window.Parsley.addValidator("maxFileSize", {
    validateString: function (_value, maxSize, parsleyInstance) {
        if (!window.FormData) {
            alert(
                "You are making all developpers in the world cringe. Upgrade your browser!"
            );
            return true;
        }
        var files = parsleyInstance.$element[0].files;
        return files.length != 1 || files[0].size <= maxSize * 1024;
    },
    requirementType: "integer",
    messages: {
        en: "This file should not be larger than %s Kb",
        fr: "Ce fichier est plus grand que %s Kb.",
    },
});

window.ParsleyValidator.addValidator(
    "fileextension",
    function (value, requirement) {
        var fileExtension = value.split(".").pop();

        return fileExtension === requirement;
    },
    32
).addMessage("en", "fileextension", "Upload only csv file to import");

$(function () {
    // Basic instantiation:
    $(".colorpicker").colorpicker({
        container: true,
        customClass: "colorpicker-2x",
        readOnly: false,
        autoInputFallback: false,
        allowEmpty: true,
    });
    $(".colorpicker").on("colorpickerChange", function (event) {
        var id = $(this).attr("id").replace("colorpicker", "");
        $("#colorpicker" + id + " .fa-square").css(
            "color",
            event.color.toString()
        );
    });
});

$("body").on("click", ".add_new_frm_field_btn", function () {
    var formGroup = $(this).closest("form").find(".form_field_outer_row");
    var inputFields = formGroup.find(".form-control"); // Replace with your input class or selector

    // Trigger validation for input fields within the form group
    inputFields.each(function () {
        $(this).parsley().validate();
    });

    // Check if any of the input fields within the form group are not valid
    var isValid = inputFields.toArray().every(function (field) {
        return $(field).parsley().isValid();
    });

    if (isValid) {
        var index =
            $(".form_field_outer").find(".form_field_outer_row").length + 1;
        addRow(index);
        var element = document.querySelector(".chain_items");
        if (element && index > 1) {
            $(".items_row" + (index - 1))
                .find("input[name='sp[]']")
                .prop("readonly", true);
            $(".items_row" + (index - 1))
                .find("select[name='firm_id[]']")
                .attr("style", "pointer-events: none; background: #e9ecef;");

            var $value = $(".items_row" + (index - 1))
                .find("input[name='sp[]']")
                .val();
            $(".items_row" + index)
                .find("input[name='cp[]']")
                .prop("readonly", true);
            $(".items_row" + index)
                .find("input[name='cp[]']")
                .val($value)
                .trigger("change");
            $(".items_row" + index)
                .find("input[name='sp[]']")
                .attr("data-parsley-minvalue", $value.replace(/,/g, ""));
        }

        dateFormater();
        letterDigitNumberValidations();
        $(".select2").select2();
        currecyInput();
        $(".number-to-words").on("input change", function () {
            let inputValue = $(this).val();
            inputValue = inputValue.replace(/,/g, ""); // Remove existing commas
            let formattedValue = formatIndianCurrency(inputValue);
            $(this).val(formattedValue);
            const convertedValue = convertNumberToWords(inputValue);
            $(this).siblings(".numberToWords").text(convertedValue);
        });

        checkRemoveBtn();
    }
});

$("body").on("click", ".remove_node_btn_frm_field", function () {
    $("body").find(".dynamic_form_content").removeClass("no_adding");
    $(this).closest(".form_field_outer_row").remove();
    $(this).parents(".dynamic_form_content").removeClass("no_adding");
    checkRemoveBtn();

    var element = document.querySelector(".chain_items");
    if (element) {
        var index = $(".form_field_outer").find(".form_field_outer_row").length;
        $(".items_row" + index)
            .find("input[name='sp[]']")
            .prop("readonly", false);
        $(".items_row" + index)
            .find("select[name='firm_id[]']")
            .attr("style", "pointer-events: inherit; background: none;");
    }
});
