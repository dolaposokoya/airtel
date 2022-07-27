const user_name = document.getElementById('name');
const multi_line = document.getElementById('multi_line');
const multi_line_number = document.getElementById('multi_line_number');
const new_line = document.getElementById('new_line');
const other_number = document.getElementById('other_number');
const airtel_number = document.getElementById('airtel_number');
const contact_mobile = document.getElementById('contact_number');
const smedan_register = document.getElementById('smedan_register');
const smedan_no = document.getElementById('smedan_no');


let error = false;

$(document).ready(async () => {
    setTimeout(() => {
        $('.loader').css('display', 'none')
        $('html, body').animate({
            scrollTop: $('form').offset().top
        }, 'slow');
    }, 1200);
})


const closeMessage = async () => {
    $('.messages').css('display', 'none')
}


const closeModal = async (event) => {
    event.preventDefault()
    $('.modal').fadeOut('slow');
}

const validateInput = async () => {
    let valid = true;
    $('.new_line').text('')
    $('.multiple_new_line').text('')
    $(".messages").css('display', 'none');
    if (multi_line.value === 'Select option') {
        $('.multiple_new_line').text('Please select an option')
        valid = false;
    }
    if (multi_line.value === 'Yes') {
        if (multi_line_number.value === '') {
            valid = false;
        }
    }
    if (multi_line.value === 'No') {
        error = false
    }
    if (new_line.value === 'Select option') {
        $('.new_line').text('Please select an option')
        valid = false;
    }
    if (new_line.value === 'No') {
        if (airtel_number.value === '') {
            valid = false;
        }
    }
    if (new_line.value === 'Yes') {
        if (other_number.value === '') {
            valid = false;
        }
    }
    if (smedan_no.value === '') {
        valid = false;
    }

    return { valid }
}

const registerForCug = async (event) => {
    try {
        event.preventDefault();
        const formData = {};
        const { valid } = await validateInput();
        $(document).ready(async () => {
            $('.loader').css('display', 'flex')
        })
        if (valid === false) {
            $(document).ready(async () => {
                $('.loader').css('display', 'none')
            })
            $(".alert-warning").text('Some fields are empty');
            $(".messages").css('display', 'flex');
            $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
            setTimeout(() => {
                $(".messages").css('display', 'none');
            }, 5000);
        }
        else {
            $(document).ready(async () => {
                $('.loader').css('display', 'flex')
            })

            formData.name = user_name.value
            formData.contact_mobile = contact_mobile.value
            formData.multi_line_number = multi_line_number.value
            formData.airtel_number = airtel_number.value
            formData.other_number = other_number.value
            formData.smedan_number = smedan_no.value
            let letter = other_number.value.substring(1);
            formData.other_number = other_number.value !== '' ? `234${letter}` : '';
            const apiURl = `controllers/register.php`;
            console.log('Form Data', JSON.stringify(formData))
            $.ajax({
                method: "POST",
                url: apiURl,
                dataType: 'json',
                data: formData,
                beforeSend: function (data) {
                    $(".member_add").html("Sending Request....");
                    setTimeout(() => { $(".member_add").html("Submit Request") }, 3500);
                },
                success: async (data) => {
                    if (data) {
                        if (data.success === false) {
                            $(document).ready(async () => {
                                $('.loader').css('display', 'none')
                            })
                            error = true;
                            $(".modal-text").text(data.message);
                            $(".modal").css('display', 'flex');
                            setTimeout(() => { $(".member_add").html("Submit Request") }, 2500);

                        }
                        else if (data.success === true) {
                            $(document).ready(async () => {
                                $('.loader').css('display', 'none')
                            })
                            error = false;
                            $(".modal-text").text(data.message);
                            $(".modal").css('display', 'flex');
                            clearInput()
                            $(".warning").css('background-color', 'hsl(134, 61%, 41%)');
                            setTimeout(() => { $(".member_add").html("Submit Request") }, 2500);
                        }
                    }
                    else {
                        error = true;
                        $(".modal-text").text('Something went wrong');
                        $(".modal").css('display', 'flex');
                        setTimeout(() => { $(".member_add").html("Submit Request") }, 2500);
                    }
                }
            });
        }
    } catch (error) {
        $(".modal-text").text(error.message);
        $(".modal").css('display', 'flex');
    }
}

function changeTextToUpperCase(event) {
    setTimeout(function () {
        event.value = event.value.toUpperCase();
        if (event.value === '') {
            $(`.${event.id}`).text(`${event.placeholder} is empty`)
        }
        else if (event.value !== "") {
            $(`.${event.id}`).text('')
        }
    }, 3);
}

function checkTextInput(event) {
    setTimeout(() => {
        if (event.value === '') {
            $(`.${event.id}`).text(`Please enter ${event.placeholder}`)
        }
        else {
            $(`.${event.id}`).text('')
        }
    }, 1);
}
function focusText(event) {
    setTimeout(() => {
        if (event.value === '') {
            $(`.${event.id}`).text(`${event.placeholder} is empty`)
        }
        else {
            $(`.${event.id}`).text('')
        }
    }, 1);
}


function checkNumberInput(event) {
    setTimeout(function () {
        if (event.value.length < 11) {
            $(`.${event.id}`).text('Phone number should be 11')
        }
        else if (event.value.length === 11) {
            $(`.${event.id}`).text('')
        }
    }, 1)
}

// $('#smedan_no').on('focus', function () {
//     try {
//         setTimeout(() => {
//             if (this.value === '') {
//                 $(`.${this.id}`).text(`Please enter ${this.placeholder}`)
//             }
//             else {
//                 console.log('event value not empty onfocus', this.value && this.value)
//                 $(`.${this.id}`).text('')
//             }
//         }, 1);
//         console.log('this.value onfocus', this.name)
//     } catch (error) {
//         $(".alert-warning").text(error.message);
//         $(".messages").css('display', 'flex');
//         $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
//     }
// });

$('#smedan_register').on('change', function () {
    try {
        if (this.value === 'Select option') {
            $(`.smedan_register`).text(`Please select option`)
        }
        else if (this.value === 'No') {
            // $('.smedan_register').text('Please register your business here');
            $('.heref').css('display', 'flex');
            $('.heref').fadeIn('slow');
        }
        else {
            $(`.smedan_register`).text('')
            $('.heref').css('display', 'none');
            $('.heref').fadeOut('slow');
        }
    } catch (error) {
        $(".alert-warning").text(error.message);
        $(".messages").css('display', 'flex');
        $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
    }
});
$('#multi_line').on('change', function () {
    try {
        if (this.value === 'Select option') {
            $(`.multiple_new_line`).text(`Please select option`)
        }
        else if (this.value === 'Yes') {
            $('.multi_view').fadeIn('slow');
            $('.multi_view').css('display', 'flex');
            $('.multi_line_info').text('Enter number and seperate them by comma');
        }
        else {
            $(`.${this.name}`).text('')
            $('.multi_view').fadeOut('slow');
            $('.multi_view').css('display', 'none');
        }
    } catch (error) {
        $(".alert-warning").text(error.message);
        $(".messages").css('display', 'flex');
        $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
    }
});

$('#new_line').on('change', function () {
    try {
        if (this.value === 'Select option') {
            console.log('Length than 11')
            $(`.${this.name}`).text('is empty')
        }
        else if (this.value === 'No') {
            $('.no_new_line').fadeIn('slow');
            $('.no_new_line').css('display', 'flex');
            $('.yes_new_line').fadeOut('slow');
            $('.yes_new_line').css('display', 'none');
        }
        else if (this.value === 'Yes') {
            $(`.${this.name}`).text('')
            $('.no_new_line').fadeOut('slow');
            $('.no_new_line').css('display', 'none');
            $('.yes_new_line').fadeIn('slow');
            $('.yes_new_line').css('display', 'flex');
        }
        console.log('New line', this.name)
    } catch (error) {
        $(".alert-warning").text(error.message);
        $(".messages").css('display', 'flex');
        $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
    }
});

const clearInput = async () => {
    $("#name").val('');
    $("#airtel_number").val('');
}