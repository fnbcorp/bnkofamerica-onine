<div class="nk-footer nk-footer-fluid">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; <?php echo date("Y"); ?> <?php echo $sitename ?> - <a href="#">All
                    rights reserved.</a>
            </div>
            <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                    <li class="nav-item"><a class="nav-link" href="privacy">Privacy</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- footer @e -->
</div>
<!-- wrap @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script defer>
    let el = document.getElementById("flag-logo")
    if (el) {
        fetch("http://www.geoplugin.net/json.gp").then((response) => {
            return response.json()
        }).then((data) => {
            let country = data.geoplugin_countryCode
            el.innerHTML = `<img src="https://flagcdn.com/24x18/${country.toLowerCase()}.png" alt="${country}" class="img-fluid">`
        }).catch((error) => {
            console.error("Error fetching country data:", error)
        })
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/country.js"></script>
<script src="../assets/js/bundle.js?ver=2.4.0"></script>
<script src="../assets/js/scripts.js?ver=2.4.0"></script>
<script src="../assets/js/charts/chart-crypto.js?ver=2.4.0"></script>
<script src="../js/sweetalert.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../js/toastr.js"></script>

</body>

</html>