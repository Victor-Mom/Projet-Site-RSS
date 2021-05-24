<?php
	global $nbN;
	$i = 0;
	$news = new FluxGateway();
	$data = $news->getAllFlux();
	foreach ($data as $obj) { $i = 0; ?>
		<div class="col-xl-5 card-body bg-dark p-1 m-2 rounded-3">
		<h3 class="text-warning h3 text-uppercase" style="font-family: 'Berlin Sans FB' ;"><?php echo $obj->getNom(); ?></h3>
		<hr class="text-white">
		<table class="table-sm table-dark table-hover">
		<?php
		$fichier = $obj->getUrl();
		$dom = new DOMDocument();
		if (!$dom->load($fichier)) {
			die('Impossible de charger le fichier XML');
		}

		$itemList = $dom->getElementsByTagName('item');
			foreach ($itemList as $item){
				if($i == $nbN + 1) {
					break;
				}
				$pubdate = $item->getElementsByTagName('pubDate');
				$titre = $item->getElementsByTagName('title');
				$lien = $item->getElementsByTagName('link');
				$desc = $item->getElementsByTagName('description');
				echo '<tr><td>';
				echo ' <a class="text-decoration-none fw-bold text-white" href="'.$lien->item(0)->nodeValue.'">';
				echo $titre->item(0)->nodeValue;
				echo '</a></td><td>';

				if(isset($desc->item(0)->nodeValue)){
					echo '<p class="fw-lighter">';
					echo $desc->item(0)->nodeValue;
					echo '</p></td>';
				}
				echo '<td>';
				echo '<p class="text-warning" style="font-size: small; ">';
				echo $pubdate->item(0)->nodeValue;
				echo '</p></td></tr>';
				$i++;
			}
			?>
		</table>
		</div>
	<?php }