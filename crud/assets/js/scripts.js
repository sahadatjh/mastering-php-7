document.addEventListener('DOMcountLoaded', function () {
    console.log('loded');
    var links = document.querySelectorAll(".delete");
    for (let i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function (e) {
            if (!confirm('Are you sure!')) {
                e.preventDefault();
            }
        })
    }
})