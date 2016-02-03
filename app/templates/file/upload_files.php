<?php $this->layout('layout', ['title' => 'UPLOAD']) ?>

<?php $this->start('main_content') ?>


<!--Upload section-->
    <section id="upload_Content" class="wrap clearfix">

        <h2><strong>Télécharger un fichier</strong></h2>
        <form id="file_Param" action="FileController.php" method="POST" enctype="multipart/form-data">

            <div id="desktop_Box" class="clearfix">
                <!--Pour la version Desktop-->
                <div id="warning_Mention" class="clearfix">
                    <h3>Ne téléchargez seulement</h3>
                    <ul>
                        <li><p>Que les fichiers dont vous avez les <a href=""><strong>droits</strong></a></li>  
                        <li><p>Qui ne violent pas nos <a href=""><strong>conditions</strong></a></li>
                        <li><p>Des questions? Voir <a href=""><strong>l'aide</strong></a></li>  
                        <li><p>Voir notre guide sur la <a href=""><strong>compression</strong></a></li>
                    </ul>
                </div>
                <!--Fin warning mention-->
                <!--Type de fichier-->
                <div id="select_Type">
                    <h4>Type de fichier :</h4>
                    <!--Checkbox-->
                    <div id="box_Row">
                        <input type="radio" id="videoFile" name="fileType" value="video">
                        <label for="fileType">Video</label>
                        <input type="radio" id="musicFile" name="fileType" value="musique">
                        <label for="fileType">Musique</label>
                        <div class="error">
                            <h6 id="type_Error"></h6>
                        </div>
                    </div>  

                    <!--licence de partage-->
                    <select id="contenu_licence" name="licence">
                        <option disabled selected> licence du media </option>
                        <option value="Creative Commons">Creative Commons</option>
                        <option value="Creative Commons NC(non commercial)">Creative Commons NC(non commercial)</option>
                        <option value="Creative Commons ND (pas de produits derivés">Creative Commons ND (pas de produits derivés</option>
                        <option value="domaine public">domaine public</option>
                        <option value="licence publique générale GNU (GPL)">licence publique générale GNU (GPL)</option>
                        <option value="contenu non libre (privé)">contenu non libre (privé)</option>
                    </select>                   
                    <div class="error">
                        <h6 id="licence_Error"></h6>
                    </div>  
        
                    <!--Type de contenu-->
                    <select name="rate" id="rating">
                            <option disabled selected> public visé</option>
                            <option value="safe">Tout public</option>
                            <option value="sensible">Contenu violent</option>
                            <option value="porn">Mature</option>
                    </select>
                    <div class="error">
                        <h6 id="rating_Error"></h6>
                    </div>
                </div>
                <!--fin type de fichier-->
            </div>
            <!--Fin desktop box-->

            <!--Upload (+ drag'n'drop pour la version desktop)-->
            <div id="upload_Zone" class="clearfix">
                <div id="zone_Row">
                    <input type="file" name="fichier" value="Choisir un fichier"  id="uploadImput" class="uploadImput" accept="video/*,audio/*">
                    <!--Limite la taille du fichier-->
                    <input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> 
                    <p class="min_Advice">Formats: .mpeg, .mp4, .x-ms-wmv, .x-msvideo, .x-flv, x-ms-asf, .mp3, .mpeg, .flac, .x-wav, .wav, .mp4, .x-ms-wma, .vnd.rn-realaudio<p>
                    <label for="file_upload">Ou glisser un fichier ici</label>
                </div>
                <div class="error">
                    <h6 id="file_Error"></h6>
                </div>
            </div>
            <!--Fin upload-->

            <!--Champs d'info-->
            <div id="info">
                <h4>Informations :</h4>

                <!--Miniature-->
                <div id="thumbs_Upload">
                    <input type="file" name="thumb" id="thumbs"accept="image/jpg, image/png, image/gif">
                    <!--Limite la taille du fichier-->
                    <input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> 
                    <p class="min_Advice">Formats: jpg, png, gif<p>
                    <div class="error">
                        <h6 id="thumb_Error"></h6>
                    </div>
                </div>
                <!--Fin miniature-->

                <!--Info & catégorie & keywords-->
                <div id="basic_Info">

                    <input type="text" name="title" placeholder="Titre du contenu" id="titleContent">
                    <div class="error">
                        <h6 id="title_Error"></h6>
                    </div>

                    <select class="dropDownCategory" placeholder="musique" id="musicCategory" name="musicCategorie">
                        <option disabled selected> selectionnez le type de musique </option>
                        <option value="Pop">Pop</option>
                        <option value="rock">rock</option>
                        <option value="Hip Hop">Hip Hop</option>
                        <option value="Jazz">Jazz</option>
                        <option value="langue">langue</option>
                        <option value="Metal">Metal</option>
                        <option value="R&B">R&B</option>
                        <option value="reggae">reggae</option>
                        <option value="reggae">reggae</option>
                        <option value="alternative">alternative</option>
                        <option value="folk">folk</option>
                        <option value="blues">blues</option>
                        <option value="musique du monde">musique du monde</option>
                    </select>

                    <select class="dropDownCategory" placeholder="categorie de film" id="movieCategory" name="movieCategory">
                        <option disabled selected> selectionnez le type de video </option>
                        <option value="animation">animation</option>
                        <option value="Art et design">Art et design</option>
                        <option value="Camera et technique">Camera et technique</option>
                        <option value="Comedie">Comedie</option>
                        <option value="clip">clip</option>
                        <option value="documentation">documentation</option>
                        <option value="experimental">experimental</option>
                        <option value="fashion">fashion</option>
                        <option value="cursive">cursive</option>
                        <option value="education">education</option>
                        <option value="narration">narration</option>
                        <option value="personnel">personnel</option>
                        <option value="reportage">reportage</option>
                        <option value="voyage">voyage</option>
                        <option value="sport">sport</option>
                    </select>
        
                    <div class="error">
                        <h6 id="categorie_Error"></h6>
                    </div>

                    <input type="text"  id="keysearch" name="keyword" placeholder="Mots clés(3 caractères min)">
                    <div class="error">
                        <h6 id="keyword_Error"></h6>
                    </div>
                </div>
                <!--Fin info, catégorie & keyword-->
                <!--Description-->
                <div id="description" class="clearfix">
                    <textarea name="describe" placeholder="Décrivez votre contenu">
                    </textarea>
                    <div class="error">
                        <h6 id="describe_Error"></h6>
                        </div>
                    </div>
                <!--Fin description-->
            </div>
            <!--Fin champs info-->
            <input type="submit" class="submit" value="Valider">
        </form>
        <!--Fin formulaire-->

    </section>


<?php $this->stop('main_content') ?>
