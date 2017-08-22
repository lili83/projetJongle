<?php 
use Symfony\Component\HttpFoundation\Session\Session;
 ?>
<section id="section_membre_2" class="contain-col maxWidht">
	<div class="contain">
		<span id="btn-profil">Mon profil</span>
		<span id="btn-mes-articles">Mes articles</span>
		<span id="btn-blog-membres">Blog membres</span>	
		<span id="btn-charte">charte</span>	
	</div>
	<section id="contenu">
		<div id="profil">
			<form action="" method="post">
				<div class="contain">
<?php  
	// Informations fournies par l'utilisateur
	// Si connecté, il peut les modifier à son gré
	// ** tests de sécurité : session started, email verified, id user and email and passwordhashed match 

	//if (isset($_SESSION["email"]) && ($_SESSION["email"] != ""))
	if($objSession->get('email') != ""){
		
		$email = $objSession->get('email');
		$reqInfosUsr = "SELECT * FROM USER WHERE EMAIL = '$email';";
		global $app;		
		$objetStatement = $app['db']->executeQuery($reqInfosUsr);
		if($res = $objetStatement->fetch()){

		extract($res);
?>				
					<label>pseudo:</label>
					<input 
						type="text" 
						name="pseudo" 
						value="<?php echo $pseudo; ?>"
					>
				</div>
				<div class="contain">
					<label>email:</label>
					<input 
						type="email" 
						name="email"
						value="<?php echo $email; ?>"
						>
				</div>
				<div class="contain">
					<label>nom:</label>
					<input 
						type="text" 
						name="nom"
						value="<?php echo $nom; ?>"
					>
				</div>
				<div class="contain">
					<label>prenom:</label>
					<input 
						type="text" 
						name="prenom"
						value="<?php echo $prenom; ?>"
					>
				</div>
				<div class="contain-col">
					<label>resumé:</label>
					<textarea
						type="text" 
						name="resume"
						rows="5"
					><?php echo $resume; ?>
				</textarea>
				</div> 
				<!--<input 
					type="text" 
					name=""
					value="	<?php 
								if(isset($resInfosUsr["pseudo"]) && $resInfosUsr["pseudo"] !="") 
									echo $resInfosUsr["pseudo"]; 
							?>"
				>-->
				<button>Modifier</button>
				<input type="hidden" name="traitement" value="update">
			</form>
<?php
		} 
	}
?>
		</div>
		<div id="mes-articles">
			<section class="contain-col">
				<article class="contain">
					<div>
						<figure>
							<img src="<?php echo $urlRoot; ?>/assets/img/test-blog.jpg" alt="photo de la recherche">
						</figure>
						<p>catégories: <span>danse, spectacle</span></p>
					</div>
					<div class="contain-col">
						<div class="contain">
							<h2>la balle noire</h2>
							<p>publié le 19/07/17 par <span>sidonie</span></p>
						</div>
						<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
						</p>
						<a href="#">> lire article</a>
					</div>
				</article>
			</section>
		</div>
		<div id="blog-membres">
			<div class="contain">
				<h1>nos recherches privées</h1>
				<form action="" method="GET" class="contain">
					<select id="select" name="categorie" required>
		                <option value="categorie">catégories</option>
		                <option value="spectacle">spectacle</option>
		                <option value="danse">danse</option>
		                <option value="jongle">jongle</option>
		                <option value="musique">musique</option>
		            </select>
		            <button type="submit">> rechercher</button>
		            <input type="hidden" name="TraitementClass" value="Categories">
				</form>
			</div>
			<section class="contain-col">
				<article class="contain">
					<div>
						<figure>
							<img src="<?php echo $urlRoot; ?>/assets/img/test-blog.jpg" alt="photo de la recherche">
						</figure>
						<p>catégories: <span>danse, spectacle</span></p>
					</div>
					<div class="contain-col">
						<div class="contain">
							<h2>la balle noire</h2>
							<p>publié le 19/07/17 par <span>sidonie</span></p>
						</div>
						<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
						</p>
						<a href="#">> lire article</a>
					</div>
				</article>

				<article class="contain">
					<div>
						<figure>
							<img src="<?php echo $urlRoot; ?>/assets/img/test-blog2.jpg" alt="photo de la recherche">
						</figure>
						<p>catégories: <span>jongle, spectacle</span></p>
					</div>
					<div class="contain-col">
						<div class="contain">
							<h2>l’homme en bleu marine qui jongle</h2>
							<p>publié le 02/01/17 par <span>marc</span></p>
						</div>
						<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
						</p>
						<a href="#">> lire article</a>
					</div>
				</article>

				<article class="contain">
					<div>
						<figure>
							<img src="<?php echo $urlRoot; ?>/assets/img/test-blog3.jpg" alt="photo de la recherche">
						</figure>
						<p>catégories: <span>jongle, spectacle</span></p>
					</div>
					<div class="contain-col">
						<div class="contain">
							<h2>les objets volants</h2>
							<p>publié le 30/05/17 par <span>mia</span></p>
						</div>
						<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
						</p>
						<a href="#">> lire article</a>
					</div>
				</article>

				<article class="contain">
					<div>
						<figure>
							<img src="<?php echo $urlRoot; ?>/assets/img/test-blog4.jpg" alt="photo de la recherche">
						</figure>
						<p>catégories: <span>jongle, spectacle</span></p>
					</div>
					<div class="contain-col">
						<div class="contain">
							<h2>un mec de dos moche</h2>
							<p>publié le 07/03/17 par <span>christophe</span></p>
						</div>
						<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
						</p>
						<a href="#">> lire article</a>
					</div>
				</article>
			</section>	
		</div>

		<div id="charte">
			<div class="contain-col">
				<h1>Charte du blog</h1>
				<article>
					<p>Bienvenue sur l’éditeur du blog de l’expédition !</p>
					<p>Pour commencer, nous vous proposons ce guide de rédaction. Avant de poster, <strong>pense</strong> ! Il est préférable de se demander si cet article sera :
					</p>
					<p>Positif. Le but est d’aller de l’avant, des textes positifs ne peuvent que soutenir votre idée.</p>
					<p>Exact. Prenez le temps de vérifier vos sources, voire de les publier à la fin de vos articles.</p>
					<p>Nécessaire. Votre point de vue est novateur et permet d’aider des jongleurs ? alors écrivez !</p>
					<p>Sage. Une idée est toujours plus percutante quand elle a pu être testé et muri par le temps.</p>
					<p>Enrichissant. Nous avons tous à y gagner, autant le lecteur que l’auteur.</p>
					<p>Pour le reste, nous comptons sur la motivation, la créativité et la bienveillance de chacun pour améliorer le contenu en privé. Vous êtes invités à aider les autres auteurs à rédiger leurs articles en les commentant dans la partie privée. Posez des questions, demandez des précisions, indiquez des coquilles ou des fautes de frappe. Cela peut être un bon moyen d’aider entre deux créations d’article.
					</p>
					<p>En espérant que cette aventure vous amuse autant que nous,  bonnes recherches :) </p>
					<p>Seul, on va plus vite, ensemble va plus loin...</p>
				</article>
			</div>
		</div>
	</section>	
</section>
