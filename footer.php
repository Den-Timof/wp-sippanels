<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sippanels
 */

?>

	<section class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6">
					<a class="footer-text" href="https://siteform.ru/">Разработка сайта - Интернет-мастерская «Сайтформ»</a>
				</div>
				<div class="col-12 col-sm-6">
					<button class="footer-text footer-policy" type="button" data-toggle="modal" data-target="#myModal3">Политика конфиденциальности</button>
				</div>
			</div>
		</div>
	</section>

	<!-- <script type="text/javascript" src="plugins/jquery.stellar/libs/jquery/jquery-1.9.1.js"></script> -->
	<!-- <script type="text/javascript" src="js/libs.js"></script> -->
	<!-- <script type="text/javascript" src="plugins/jquery.stellar/jquery.stellar.js"></script> -->
	<!-- <script type="text/javascript" src="plugins/wow/dist/wow.min.js"></script> -->
	<!-- <script type="text/javascript" src="plugins/lavalamp/jquery.lavalamp.min.js"></script> -->
	<!-- <script type="text/javascript" src="js/init.js"></script> -->

<?php wp_footer(); ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter49867723 = new Ya.Metrika2({
id:49867723,
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
webvisor:true
});
} catch(e) { }
});

var n = d.getElementsByTagName("script")[0],
s = d.createElement("script"),
f = function () { n.parentNode.insertBefore(s, n); };
s.type = "text/javascript";
s.async = true;
s.src = "https://mc.yandex.ru/metrika/tag.js";

if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/49867723" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
