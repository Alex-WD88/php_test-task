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

document.addEventListener('DOMContentLoaded', function () {
    var cookiePopup = document.getElementById('cookiePopup');
    var acceptCookies = document.getElementById('acceptCookies');
    var closePopup = document.getElementById('closePopup');
    
    var cookiesAccepted = document.cookie.split(';').some(function (item) {
        return item.trim().startsWith('cookiesAccepted=');
    });
    
    if (!cookiesAccepted) {
        cookiePopup.classList.add('show');
    }
    
    acceptCookies.addEventListener('click', function () {
        document.cookie = "cookiesAccepted=true; max-age=86400; path=/";
        cookiePopup.classList.remove('show');
    });
    
    closePopup.addEventListener('click', function () {
        cookiePopup.classList.remove('show');
    });
});