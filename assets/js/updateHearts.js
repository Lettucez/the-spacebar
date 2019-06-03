document.addEventListener("DOMContentLoaded", () => {

    (function handleHeart() {

        let parent = document.querySelectorAll('a.level-item')[document.querySelectorAll('a.level-item').length - 1];

        parent.addEventListener('click', addHeart);

        let xhttp = null;

        function addHeart(event) {
            event.preventDefault();

            if (!xhttp) {

                let heart = document.querySelector(".fa-heart");
                let value = document.querySelectorAll('a.level-item')[document.querySelectorAll('a.level-item').length - 1].firstElementChild;
                heart.classList.value = 'fas fa-heart';

                xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        value.innerHTML = JSON.parse(this.responseText).heart;
                    }
                };

                xhttp.open('GET', parent.href);
                xhttp.send();
            }
        }

    })();

});

