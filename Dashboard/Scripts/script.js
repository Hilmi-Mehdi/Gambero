function check() {
    let theme = document.cookie;
    if (theme.includes('dark')) {
        document.body.classList.add("dark-theme-variables");
        document
            .querySelector(".theme-toggler")
            .querySelector("span:nth-child(2)")
            .classList.add("active");
        document
            .querySelector(".theme-toggler")
            .querySelector("span:nth-child(1)")
            .classList.remove("active");
    } else {
        document.body.classList.remove("dark-theme-variables");
        document
            .querySelector(".theme-toggler")
            .querySelector("span:nth-child(2)")
            .classList.remove("active");
        document
            .querySelector(".theme-toggler")
            .querySelector("span:nth-child(1)")
            .classList.add("active");
    }
}

function show() {
    document.getElementById("side").style.display = "block";
}

function hide() {
    document.getElementById("side").style.display = "none";
}

function toggleTheme() {
    document.cookie = document
        .querySelector(".theme-toggler")
        .querySelector("span:nth-child(1)")
        .classList.contains("active")? 'dark':'light';
    document.body.classList.toggle("dark-theme-variables");
    document
        .querySelector(".theme-toggler")
        .querySelector("span:nth-child(1)")
        .classList.toggle("active");
    document
        .querySelector(".theme-toggler")
        .querySelector("span:nth-child(2)")
        .classList.toggle("active");
}
