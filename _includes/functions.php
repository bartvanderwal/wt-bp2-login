<?php
    /**
     * Check of een sessie al geladen en actief is.
     * @return bool true als er al sessie actief is, anders false.
     */
    function isSessieGeladen() {
        // Bron: https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
        return session_status() === PHP_SESSION_ACTIVE;
    }

    /**
    * Checkt dat het huidige script anders is dan huidige pagina URL, of stopt anders met processen.
     * Gebruik dit om te voorkomen dat gebruikers via url hacking bij pagina komen, of developer fout maakt tijdens debuggen.
    */
    function checkIncludePagina() {
        $currentPage = __FILE__;
        $currentUrl = $_SERVER['REQUEST_URI'];
        if (strpos($currentUrl, '_includes')) {
            die("Deze page $currentPage is een 'partial page/view' en niet bedoeld om als hele pagina weer te geven.");
        }
        // echo "current page: $currentPage";
        // echo "current url: $currentUrl";
    }