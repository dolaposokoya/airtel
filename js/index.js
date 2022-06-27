const hospital_name = document.getElementById('hospital_name');
const reg_number = document.getElementById('reg_number');
const hospital_email = document.getElementById('hospital_email');
const address = document.getElementById('address');
const state = document.getElementById('state');
const lga = document.getElementById('lga');
const contact_name = document.getElementById('contact_name');
const contact_email = document.getElementById('contact_email');
const contact_mobile = document.getElementById('contact_mobile');

let error = false;
let states = [];
let stateLga = [];
let localGoverment = {};

$(document).ready(async () => {
    setTimeout(() => {
        $('.loader').css('display', 'none')
        $('html, body').animate({
            scrollTop: $('form').offset().top
        }, 'slow');
    }, 1200);
    $(".modal-text").text('Note: \n If you have other branches please register them separately for documentation, this only registers this particular hospital');
    $('.modal').css('display', 'flex')
})


$('#state').on('change', function () {
    try {
        localGoverment[this.value].map(item => {
            const { name, abrv } = item
            $('#lga').append(`
        <option name=${item}>${item}</option>
        `)
        })
    } catch (error) {
        $(".alert-warning").text(error.message);
        $(".messages").css('display', 'flex');
        $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
    }
});

$(document).ready(async () => {
    try {
        const url = './state.json';
        const lgaurl = './lga.json';
        const headers = new Headers();
        headers.append('Accept', 'application/json');
        const options = {
            method: 'GET',
            headers
        }
        const result = await fetch(url, options)
        const lgaRresult = await fetch(lgaurl, options)
        const response = await result.json();
        const lgaRresponse = await lgaRresult.json();
        const { ruawi_states } = response
        const { lgaList } = lgaRresponse
        states = ruawi_states;
        localGoverment = lgaList;
        ruawi_states.map(item => {
            const { name, abrv } = item
            $('#state').append(`
            <option name=${abrv}>${name}</option>
            `)
        })
    } catch (error) {
        $(".alert-warning").text(error.message);
        $(".messages").css('display', 'flex');
        $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
    }
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
    const hospital_nameError = {};
    const reg_numberError = {};
    const hospital_emailError = {};
    const addressError = {};
    const stateError = {};
    const lgaError = {};
    const contact_nameError = {};
    const contact_emailError = {};
    const contact_mobileError = {};

    $(".hospital_name").text('');
    $(".reg_number").text('');
    $(".hospital_email").text('');
    $(".address").text('');
    $(".state").text('');
    $(".lga").text('');
    $(".contact_name").text('');
    $(".contact_email").text('');
    $(".contact_mobile").text('');
    $(".messages").css('display', 'none');


    if (hospital_name.value === '') {
        hospital_nameError.empty = 'Hospital name is required';
        valid = false;
    }
    if (reg_number.value === '') {
        reg_numberError.empty = 'Registration number is required';
        valid = false;
    }
    if (hospital_email.value === '') {
        hospital_emailError.empty = 'Hospital email is required';
        valid = false;
    }
    if (address.value === '') {
        addressError.empty = 'Address is required';
        valid = false;
    }
    if (state.value === '' || state.value === 'Select state') {
        stateError.empty = 'State is required';
        valid = false;
    }
    if (lga.value === '' || lga.value === 'Select local government') {
        lgaError.empty = 'Local government is required';
        valid = false;
    }
    if (contact_name.value === '') {
        contact_nameError.empty = 'Contact person name is required';
        valid = false;
    }
    if (contact_email.value === '') {
        contact_emailError.empty = 'Contact person email is required';
        valid = false;
    }
    if (contact_mobile.value === '') {
        contact_mobileError.empty = 'Phone is required';
        valid = false;
    }
    if (contact_mobile.value.length < 11) {
        contact_mobileError.length = 'Phone should be 11 characters or more';
        valid = false;
    }
    return {
        hospital_nameError, reg_numberError, hospital_emailError, addressError, stateError, lgaError, contact_nameError,
        contact_emailError, contact_mobileError, valid
    }
}

const becomeAMember = async (event) => {
    event.preventDefault();
    const formData = {};
    const { hospital_nameError, reg_numberError, hospital_emailError, addressError, stateError, lgaError, contact_nameError,
        contact_emailError, contact_mobileError, valid } = await validateInput();
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
        Object.keys(hospital_nameError).map(item => {
            $(".hospital_name").text(hospital_nameError[item]);
        })
        Object.keys(reg_numberError).map(item => {
            $(".reg_number").text(reg_numberError[item]);
        })
        Object.keys(hospital_emailError).map(item => {
            $(".hospital_email").text(hospital_emailError[item]);
        })
        Object.keys(addressError).map(item => {
            $(".address").text(addressError[item]);
        })
        Object.keys(stateError).map(item => {
            $(".state").text(stateError[item]);
        })
        Object.keys(lgaError).map(item => {
            $(".lga").text(lgaError[item]);
        })
        Object.keys(contact_nameError).map(item => {
            $(".contact_name").text(contact_nameError[item]);
        })
        Object.keys(contact_emailError).map(item => {
            $(".contact_email").text(contact_emailError[item]);
        })
        $(".contact_mobile").text(contact_mobileError.empty);
        $(".phone_length").text(contact_mobileError.length);
    }
    else {

        $(document).ready(async () => {
            $('.loader').css('display', 'flex')
        })
        formData.hospital_name = hospital_name.value
        formData.reg_number = reg_number.value
        formData.hospital_email = hospital_email.value
        formData.address = address.value
        formData.state = state.value
        formData.lga = lga.value
        formData.contact_name = contact_name.value
        formData.contact_email = contact_email.value
        formData.contact_mobile = contact_mobile.value
        const apiURl = `controllers/register.php`;
        $.ajax({
            method: "POST",
            url: apiURl,
            dataType: 'json',
            data: formData,
            beforeSend: function (data) {
                $(".member-add").html("Sending....");
                setTimeout(() => { $(".member-add").html("Register"); }, 5000);
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
                        setTimeout(() => { $(".member-add").html("Register") }, 2500);

                    }
                    else if (data.success === true) {
                        $(document).ready(async () => {
                            $('.loader').css('display', 'none')
                        })
                        error = false;
                        $(".modal-text").text(data.message);
                        $(".modal").css('display', 'flex');
                        $(".warning").css('background-color', 'hsl(134, 61%, 41%)');

                        setTimeout(() => { $(".member-add").html("Register") }, 2500);
                    }
                }
                else {
                    error = true;
                    $(".modal-text").text('Something went wrong');
                    $(".modal").css('display', 'flex');
                    setTimeout(() => { $(".member-add").html("Register") }, 2500);
                }
            }
        });
    }
}