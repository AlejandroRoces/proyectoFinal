let counters = document.querySelectorAll(".num");

counters.forEach(counter => {
    let target = +counter.getAttribute("data-val");
    let count = 0;
    let increment = target / 100;

    let updateCount = () => {
        if (count < target) {
            count += increment;
            counter.innerText = Math.floor(count);
            setTimeout(updateCount, 20);
        } else {
            counter.innerText = target;
        }
    };

    updateCount();
});