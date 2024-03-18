</main>
    <footer>
        <p>Studentský zápočtový projekt na KTPW1 | 2023 Copyrights &copy; Matějovský Lukáš | Email: matejlu2@uhk.cz |
            Poslední úprava provedena 21. ledna 2023</p>
    </footer>
    <script>
        /* Jednoduché burger menu */
        $("#navbar_container").on("click", function () {
            if ($("nav").css("height") === "300px") {
                $("nav").css("height", "0px");
                $("#navbar_container").css("background-image", "url('images/icons8-menu-rounded-50.png')");
            } else {
                $("nav").css("height", "300px");
                $("#navbar_container").css("background-image", "url('images/app_menu_sideways.png')");
            }
        });

        $(window).on("resize", function () {
            /* $("nav").css("transition", "none"); */
            var win = $(this);
            if (win.width() > 768) {
                $("#navbar_container").css("background-image", "url('images/app_menu_sideways.png')");
                $("nav").css("height", "50px");
            } else {
                $("#navbar_container").css("background-image", "url('images/icons8-menu-rounded-50.png')");
                $("nav").css("height", "0px");
            }
        });
    </script>
</body>

</html>