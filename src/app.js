function loadPhoneCode() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };
    xhr.open("POST", "./phone.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("phoneNumber=" + encodeURIComponent(document.getElementsByName("phoneNumber")[0].value));
}

document.addEventListener('DOMContentLoaded', (event) => {
});


document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.main_block span').forEach(function (span) {
        span.addEventListener('click', function (e) {
            document.querySelectorAll('li.advantages__block').forEach(function (advantagesBlock) {
                advantagesBlock.classList.remove('active');
            });
            
            e.target.closest('li.advantages__block').classList.add('active');
        });
    });
    
    document.querySelectorAll('.description_block span').forEach(function (span) {
        span.addEventListener('click', function (e) {
            e.target.closest('li.advantages__block').classList.remove('active');
        });
    });
});