</main>
<footer id="footer-cinetech">
  mon footer
</footer>
<?php
$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';
$hostName = $_SERVER['SERVER_NAME'];
$pathJs = $protocol . $hostName . "/assets/js";
?>
<!-- Add Script -->
<script src="<?= $pathJs; ?>/library.cinetech.js"></script>
<script src="<?= $pathJs; ?>/library.observer.js"></script>
</body>

</html>