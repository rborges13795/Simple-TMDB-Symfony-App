const bar = document.getElementById("bar");
const tips = document.getElementById("tips");
bar.addEventListener('input', ({target}) => {
    const input = target.value;
    if (input.length) {
        fetch(`https:api.themoviedb.org/3/search/movie?api_key=${putAPIKeyHere}&query=${input}`)
        .then(
            response => {
                return response.json();
            }
        )
        .then(
            data => {
                window.appl = (va) => {
                    bar.value = va;
                }
                tips.innerHTML = `${data.results.map((val) => {
                    console.log(val.release_date.substr(0, 4))
                    return (`<li onmouseover='appl("${val.title}")'><strong>${val.title}</strong> ${val.release_date.substr(0, 4)}</li>`)
                }).join('')}`
            }
        );
    }
    
})


bar.addEventListener('focusout', () => {
    tips.style.display = "none";
})

bar.addEventListener('focus', () => {
    tips.style.display = "block";
})