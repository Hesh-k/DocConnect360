
var d_array = [
    { month: 'January', days: 31 },
    { month: 'Febr0ary', days: 29 },
    { month: 'March', days: 31 },
    { month: 'April', days: 30 },
    { month: 'May', days: 31 },
    { month: 'June', days: 30 },
    { month: 'July', days: 31 },
    { month: 'August', days: 31 },
    { month: 'Septhember', days: 30 },
    { month: 'October', days: 31 },
    { month: 'November', days: 30 },
    { month: 'December', days: 31 },
];

function validateForm() {
    var nicNumber = document.getElementById("nic").value;
    var birthday = document.getElementById("birthday").value;
    var gender = document.querySelector('input[name="gender"]:checked').value;

    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (!validateNIC(nicNumber, birthday, gender)) {
        document.getElementById("validationError").innerHTML = "NIC number does not match with the provided birthday and gender.";
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
}

function validateNIC(nicNumber, birthday, gender) {
    var extractedData = extractData(nicNumber);
    var days = extractedData.dayList;
    var foundData = findDayAndGender(days, d_array);

    var month = foundData.month;
    var year = extractedData.year;
    var day = foundData.day;
    var nicGender = foundData.gender;

    var bday = day + '-' + month + '-' + year;
    var formattedBirthday = getFormattedDate(new Date(bday.replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3")));

    return birthday === formattedBirthday && gender === nicGender;
}

function findDayAndGender(days, d_array) {
    var dayList = days;
    var month = '';
    var result = { day: '', month: '', gender: '' };

    if (dayList < 500) {
        result.gender = 'Male';
    } else {
        result.gender = 'Female';
        dayList = dayList - 500;
    }

    for (var i = 0; i < d_array.length; i++) {
        if (d_array[i]['days'] < dayList) {
            dayList = dayList - d_array[i]['days'];
        } else {
            month = d_array[i]['month'];
            break;
        }
    }
    result.day = dayList;
    result.month = month;
    return result;
}

function extractData(nicNumber) {
    var result = { year: '', dayList: '', character: '' };

    if (nicNumber.length === 10) {
        result.year = nicNumber.substr(0, 2);
        result.dayList = nicNumber.substr(2, 3);
        result.character = nicNumber.substr(9, 10);
    } else if (nicNumber.length === 12) {
        result.year = nicNumber.substr(0, 4);
        result.dayList = nicNumber.substr(4, 3);
        result.character = 'no';
    }
    return result;
}

function getFormattedDate(date) {
    var year = date.getFullYear();

    var month = (1 + date.getMonth()).toString();
    month = month.length > 1 ? month : '0' + month;

    var day = date.getDate().toString();
    day = day.length > 1 ? day : '0' + day;

    return month + '/' + day + '/' + year;
}

// Event listener for clearing the validation error message
document.getElementById("nic").addEventListener("input", function() {
    document.getElementById("validationError").innerHTML = "";
});
