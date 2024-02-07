let flag = true;
console.log(document.getElementById("side-nav-bar-show").innerHTML);
var isMobileView = window.matchMedia("(max-width: 480px)").matches;
if (isMobileView) {
    document.getElementById("hide-mobile").style.display = "none"
    document.getElementById("button-side-nav-bar").innerHTML = ` 
   
<nav class="navbar navbar-light bg-light">

<div class="container-fluid d-flex justify-content-between">
<a class="navbar-brand" href="./candidate-dashboard.html">
        Candidate Navigation
    </a>
<button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#side-nav-bar" aria-controls="side-nav-bar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
</div>
</nav>
<div class="collapse" id="side-nav-bar">
<div class="bg-light p-4">
`+ document.getElementById("side-nav-bar-show").innerHTML; +`
</div>
</div>`
}