//For User Password Reset/Change

$(document).ready(function () {
    $("#ChangePasswordForm").on("submit", function (e) {
        e.preventDefault();

        var data = new FormData($(this)[0]);
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        console.log(data);
        var url = $(this).attr("action");

        $.ajax({
            url: url,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            contentType: false,
            processData: false,
            data: data,

            success: function (response) {
                // alert(response.success);
                // // window.location.href = "/admin/category";
                //  $("#ChangePasswordForm")[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    // $.each(errors, function (key, value) {
                    //     $('[name="' + key + '"]')
                    //         .parent()
                    //         .find(".error, .error_no_margin")
                    //         .text("** " + value[0] + "!");
                    // });
                    // var errors = response.error;

                    if (errors.old_password) {
                        $("#old_password")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.old_password);
                    } else {
                        $("#old_password")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.old_password);
                    }

                    if (errors.new_password) {
                        $("#new_password")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.new_password);
                    } else {
                        $("#new_password")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.new_password);
                    }

                    if (errors.confirm_password) {
                        $("#confirm_password")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.confirm_password);
                    } else {
                        $("#confirm_password")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.confirm_password);
                    }
                }
            },
        });
    });
});

//=======//==============//=====================//=========================//=================================================//
//=======//==============//=====================//=========================//=================================================//

//For User Update Profile

$(document).ready(function () {
    $("#ProfileUpdateForm").on("submit", function (e) {
        e.preventDefault();

        var data = new FormData($(this)[0]);
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        console.log(data);
        var url = $(this).attr("action");

        $.ajax({
            url: url,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            contentType: false,
            processData: false,
            data: data,

            success: function (response) {
                // alert(response.success);
                // // window.location.href = "/admin/category";
                //  $("#ChangePasswordForm")[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('[name="' + key + '"]')
                            .parent()
                            .find(".error, .error_no_margin")
                            .text("** " + value[0] + "!");
                    });
                }
            },
        });
    });
});

//==========================================================================================

//User Addresses

$(document).ready(function () {
    $("#CheckoutForm").on("submit", function (e) {
        e.preventDefault();
        var data = new FormData($(this)[0]);
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        console.log(data);
        var url = $(this).attr("action");

        $.ajax({
            url: url,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            contentType: false,
            processData: false,
            data: data,

            success: function (response) {
                $("#CheckoutForm")[0].reset();
                alert("Order Placed Successfully");
                window.location.href = "/user/cart";
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    if (errors.first_name) {
                        $("#first_name")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.first_name);
                    } else {
                        $("#first_name")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.first_name);
                    }

                    if (errors.last_name) {
                        $("#last_name")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.last_name);
                    } else {
                        $("#last_name")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.last_name);
                    }

                    if (errors.email) {
                        $("#email")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.email);
                    } else {
                        $("#email")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.email);
                    }

                    if (errors.country) {
                        $("#country")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.country);
                    } else {
                        $("#country")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.country);
                    }

                    if (errors.address) {
                        $("#address")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.address);
                    } else {
                        $("#address")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.address);
                    }

                    if (errors.appartment) {
                        $("#appartment")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.appartment);
                    } else {
                        $("#appartment")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.appartment);
                    }

                    if (errors.city) {
                        $("#city")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.city);
                    } else {
                        $("#city")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.city);
                    }

                    if (errors.state) {
                        $("#state")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.state);
                    } else {
                        $("#state")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.state);
                    }

                    if (errors.mobile) {
                        $("#mobile")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.mobile);
                    } else {
                        $("#mobile")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.mobile);
                    }

                    if (errors.card_number) {
                        $("#card_number")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.card_number);
                    } else {
                        $("#card_number")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.card_number);
                    }

                    if (errors.expiry_date) {
                        $("#expiry_date")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.expiry_date);
                    } else {
                        $("#expiry_date")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.expiry_date);
                    }

                    if (errors.zip) {
                        $("#zip")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.zip);
                    } else {
                        $("#zip")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.zip);
                    }

                    if (errors.cvv) {
                        $("#cvv")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.cvv);
                    } else {
                        $("#cvv")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.cvv);
                    }
                }
            },
        });
    });
});

//=======//==============//=====================//============================//

// $(document).ready(function () {
//     $("#DecreaseCartForm").on("click", function (e) {
//         e.preventDefault();
//         var data = new FormData($(this)[0]);
//         let csrfToken = $('meta[name="csrf-token"]').attr("content");
//         console.log(data);
//         var url = $(this).attr("action");

//         $.ajax({
//             url: url,
//             type: "POST",
//             headers: {
//                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//             },
//             contentType: false,
//             processData: false,
//             data: data,

//             success: function (response) {
//                 // $("#DecreaseCartForm")[0].reset();
//                 // alert(response.success);
//                 window.location.href = "/user/cart";
//             },
//             error: function (xhr) {
//                 if (xhr.status === 422) {
//                     var errors = xhr.responseJSON.errors;
//                     // $.each(errors, function (key, value) {
//                     //     $('[name="' + key + '"]')
//                     //         .parent()
//                     //         .find(".error, .error_no_margin")
//                     //         .text("** " + value[0] + "!");
//                     // });
//                 }
//             },
//         });
//     });
// });

//User Cart Functionality

function updateQuantity(cartId, action) {
    let url =
        action === "increase"
            ? "/user/cart/increase/" + cartId
            : "/user/cart/decrease/" + cartId;

    $.ajax({
        url: url,
        method: "PUT",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.success) {
                $("#cart-quantity-" + cartId).val(response.newQty);
                $("#cart-total-" + cartId).text(response.newTotal);
                updateCartSummary();
            } else {
                alert(response.message);
            }
        },
    });
}

function removeItem(cartId) {
    let url = "/user/cart/remove_item/" + cartId;

    $.ajax({
        url: url,
        method: "DELETE",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.success) {
                $("#cart-item-" + cartId).remove();
                updateCartSummary();
            }
        },
    });
}

function updateCartSummary() {
    let total = 0;

    // Iterate through each cart item row
    $('tr[id^="cart-item-"]').each(function () {
        let cartId = $(this).attr("id").split("-")[2]; // Extract cart ID from row ID
        let quantity = parseInt($("#cart-quantity-" + cartId).val());
        let price = parseFloat(
            $("#cart-total-" + cartId)
                .text()
                .replace(/[^0-9.-]+/g, "")
        );

        if (!isNaN(quantity) && !isNaN(price)) {
            total += price;
        }
    });

    // Update the subtotal and total in the cart summary
    $("#cart-subtotal").text(total.toFixed(2));
    $("#cart-total").text(total.toFixed(2));
}

//=======//==============//=====================//============================//

$(document).ready(function () {
    // Hide all forms on page load
    $("#CardPaymentForm").addClass("d-none");
    $("#CardPaymentFormOne").addClass("d-none");
    $("#CardPaymentFormTwo").addClass("d-none");
    $("#CardPaymentFormThree").addClass("d-none");

    // Check which payment method is selected on page load and show the correct form
    if ($("#payment_method").is(":checked")) {
        $("#CardPaymentForm").removeClass("d-none");
    } else if ($("#payment_method_one").is(":checked")) {
        $("#CardPaymentFormOne").removeClass("d-none");
    } else if ($("#payment_method_two").is(":checked")) {
        $("#CardPaymentFormTwo").removeClass("d-none");
    } else if ($("#payment_method_three").is(":checked")) {
        $("#CardPaymentFormThree").removeClass("d-none");
    }

    // Event listener for COD
    $("#payment_method_one").on("click", function () {
        if ($(this).is(":checked") == true) {
            $("#CardPaymentFormOne").removeClass("d-none");
            $("#CardPaymentFormTwo").addClass("d-none");
            $("#CardPaymentFormThree").addClass("d-none");
        }
    });

    // Event listener for Stripe
    $("#payment_method_two").on("click", function () {
        if ($(this).is(":checked") == true) {
            $("#CardPaymentFormTwo").removeClass("d-none");
            $("#CardPaymentFormOne").addClass("d-none");
            $("#CardPaymentFormThree").addClass("d-none");
        }
    });

    // Event listener for PayPal
    $("#payment_method_three").on("click", function () {
        if ($(this).is(":checked") == true) {
            $("#CardPaymentFormThree").removeClass("d-none");
            $("#CardPaymentFormOne").addClass("d-none");
            $("#CardPaymentFormTwo").addClass("d-none");
        }
    });

    // None
    $("#payment_method").on("click", function () {
        if ($(this).is(":checked") == true) {
            $("#CardPaymentFormOne").addClass("d-none");
            $("#CardPaymentFormTwo").addClass("d-none");
            $("#CardPaymentFormThree").addClass("d-none");
        }
    });
});

//=======//==============//=====================//============================//

$(document).ready(function () {
    $("#ProductRatingForm").on("submit", function (e) {
        e.preventDefault();
        var data = new FormData($(this)[0]);
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        console.log(data);
        var url = $(this).attr("action");

        $.ajax({
            url: url,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            contentType: false,
            processData: false,
            data: data,

            success: function (response) {
                if (response.redirect_url) {
                    window.location.href = response.redirect_url;
                } else {
                    // Default redirect or action if no redirect URL is provided
                    window.location.href = "{{route('viewproduct')}}";
                }
                
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    if (errors.name) {
                        $("#name")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.name);
                    } else {
                        $("#name")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.name);
                    }

                    if (errors.rating) {
                        $("#rating")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.rating);
                    } else {
                        $("#rating")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.rating);
                    }

                    if (errors.comment) {
                        $("#comment")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.comment);
                    } else {
                        $("#comment")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.comment);
                    }

                    if (errors.email) {
                        $("#email")
                            .addClass("is-invalid")
                            .siblings("p")
                            .addClass("invalid-feedback")
                            .html(errors.email);
                    } else {
                        $("#email")
                            .removeClass("is-invalid")
                            // .siblings("p")
                            .removeClass("invalid-feedback")
                            .html(errors.email);
                    }
                }
            },
        });
    });
});
