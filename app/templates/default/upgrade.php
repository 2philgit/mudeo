<?php $this->layout('layout', ['title' => 'Abonnement']) ?>

<?php $this->start('main_content'); ?>

<!--Choix de l'abonnement-->
	<section id="abonnement" class="wrap clearfix">
		<h2><strong>Découvrez nos formules</strong></h2>
		
		<!--Centrage pour la version desktop-->
		<div id="table_wrap" class="clearfix">

			<!--Mudéo basic : formule de base gratuite, souscrit à l'inscription-->
			<table id="basic_Abo">
				<thead>
					<tr>
						<th>
							<h3><strong>Mudeo Basic</strong></h3>
							<p>Pour un avant gout de mudeo</p>
							<!--Souscrit par défaut-->
							<a href=""><button>Déjà souscrit</button></a>
							<!--En cas de souscription à un autre compte-->
							<!--<a href=""><button>Souscrire</button></a>-->
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>
							<h5>500MB/semaine</h5>
							<p>Soit 25Gb par an</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Vie privée</h5>
							<p>Protection de base</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Support</h5>
							<p>Réponse aux emails sous 3 jours ouvrés</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Statistiques</h5>
							<p>Fréquentation uniquement</p>
						</th>
					</tr>
				</tbody>
			</table>

			<!--Mudeo plus-->
			<table id="plus_Abo">
				<thead>
					<tr>
						<th>
							<h3><strong>Mudeo Plus</strong></h3>
							<p>Pour tous</p>
							<!--Si pas souscrit-->
							<a href=""><button>Souscrire</button></a>
							<!--Si déjà souscrit-->
							<!--<a href=""><button>Déjà souscrit</button></a>-->
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>
							<h5>5GB/semaine</h5>
							<p>Soit 250Gb par an</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Vie privée</h5>
							<p>Protection de base</p>
							<p>Nom de domaine protégé</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Support</h5>
							<p>Réponse aux emails sous 4h en semaine et 24h le week-end</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Statistiques</h5>
							<p>Fréquentation</p>
							<p>Like</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Customisation</h5>
							<p>Player customisable</p>
						</th>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th>
							<h5>49.95€ par an</h5>
							<p>ou 7.95€ par mois</p>
						</th>
					</tr>
				</tfoot>
			</table>


			<!--Mudeo pro-->
			<table id="pro_Abo">
				<thead>
					<tr>
						<th>
							<h3><strong>Mudeo Pro</strong></h3>
							<p>Pour les professionnels</p>
							<!--Si pas souscrit-->
							<a href=""><button>Souscrire</button></a>
							<!--Si déjà souscrit-->
							<!--<a href=""><button>Déjà souscrit</button></a>-->
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>
							<h5>20GB/semaine</h5>
							<p>Soit 1Tb par an</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Vie privée</h5>
							<p>Protection de base</p>
							<p>Nom de domaine protégé</p>
							<p>Pages privées</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Support</h5>
							<p>Réponse aux emails sous 1h en semaine et 24h le week-end</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Statistiques</h5>
							<p>Statistiques complètes</p>
						</th>
					</tr>
					<tr>
						<th>
							<h5>Customisation</h5>
							<p>Player customisable</p>
							<p>Page customisable</p>
							<p>Support des API tiers</p>
						</th>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th>
							<h5>159€ par an</h5>
							<p>ou 359€ par an pour passer à 3Tb/an</p>
						</th>
					</tr>
				</tfoot>
			</table>

		</div>

	</section>

	<!--Section secondaire-->
	<aside id="cook_Question" class="wrap">

		<div id="cooking">
			<h2>Tous les comptes mudeo sont fournis avec d'incroyables ingrédients</h2>

			<div id="min_Cook" class="clearfix">
				<figure class="img_Cook">
					<img src="img_site/support_picture/add.png" alt="pas de publicité">
				<figcaption>
					<p>Pas de publicité, avant, après ou pendant vos contenus</p>
				</figcaption>
				</figure>
				<figure class="img_Cook">
					<img src="img_site/support_picture/stat.png" alt="Statistiques de vos contenus">
				<figcaption>
					<p>Obtenez les statistiques sur vos contenus</p>
				</figcaption>
				</figure>
				<figure class="img_Cook">
					<img src="img_site/support_picture/priv.png" alt="vie privée">
				<figcaption>
					<p>Respect de la vie privée</p>
				</figcaption>
				</figure>
				<figure class="img_Cook">
					<img src="img_site/support_picture/tool.png" alt="Support 24heure sur 24 en semaine">
				<figcaption>
					<p>Un support humain, 24h/24 en semaine</p>
				</figcaption>
				</figure>
				<figure class="img_Cook">
					<img src="img_site/support_picture/control.png" alt="Possibilité de customisation">
				<figcaption>
					<p>Customisation possible</p>
				</figcaption>
				</figure>
				<figure class="img_Cook">
					<img src="img_site/support_picture/screen.png" alt="Disponible sur plusieurs supports">
				<figcaption>
					<p>Accessible sur plusieurs supports</p>
				</figcaption>
				</figure>
			</div>
		</div>

		<div id="question">
			<h2>Des questions?</h2>
			<p>Contactez notre support, ouvert 24h/24h en semaine</p>
			<div id="support_Img">
				<img src="img_site/support_picture/2.jpg" alt="support">
				<img src="img_site/support_picture/9.jpg" alt="support">
				<img src="img_site/support_picture/27.jpg" alt="support">
				<img src="img_site/support_picture/31.jpg" alt="support">
				<img src="img_site/support_picture/41.jpg" alt="support">
				<img src="img_site/support_picture/52.jpg" alt="support">
				<img src="img_site/support_picture/78.jpg" alt="support">
				<img src="img_site/support_picture/80.jpg" alt="support">
				<img src="img_site/support_picture/81.jpg" alt="support">
				<img src="img_site/support_picture/93.jpg" alt="support">
				<img src="img_site/support_picture/96.jpg" alt="support">
				<img src="img_site/support_picture/99.jpg" alt="support">
			</div>
			
		</div>
	</aside>

<?php $this->stop('main_content') ?>