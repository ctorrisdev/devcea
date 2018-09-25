<div class="echanger-part grid-container full">

    <div class="grid-x grid-padding-x grid-padding-y" >

        <!-- nouveau commentaire -->
        <div class="cell">    
            <div class="media-object">
                <a href="#media" class="ajout_media_post"><?= __('Joindre médias'); ?></a>
                <div class="input-group">
                    <span class="input-group-label"><i class="la la-lg la-comment"></i></span>
                    <input class="input-group-field new_wall_post_content" type="text">
                    <div class="input-group-button">
                        <button type="submit" class="button hollow submit_wall_post"><i class="la la-lg la-pencil"></i></button>
                    </div>
                </div>
            </div>
            <div class='uploader'>
                <div id='dropfile' class="imageinterface">                            
                    <div class="uptext">
                        <span class="social_gris">Faire glisser ma photo<br/>ou</br></span>
                        <span class="social_bleu"> <div class="redbutton rightfloat parcourir imageinterface">Télécharger depuis l'ordinateur</div></span>
                    </div>
                </div>
                <input type="file" name="fichier" value="parcourir" id="fichier" class="hidden imageinterface"/>
            </div>
            
        </div>
        <!-- fin nouveau commentaire -->

        
        <div class="cell">

            <div class="media-object">
                <i class="la la-2x la-comment"></i>

                <div class="media-object-section">
                    <div class="clearfix">
                        <h5 class="float-left"><small>par auteur, le 10.05.2018</small></h5>
                        <div class="editor float-right">
                            <i class="la la-pencil"></i>
                            <i class="la la-trash"></i>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro at, tenetur cum beatae excepturi id ipsa? Esse dolor laboriosam itaque ea nesciunt, earum, ipsum commodi beatae velit id enim repellat.</p>

                    <!-- sous commentaire -->
                    <div class="subcomment media-object">
                        <i class="la la-lg la-comments"></i>
                        <div class="media-object-section">

                            <div class="clearfix">
                                <h6 class="float-left"><small>par auteur, le 10.05.2018</small></h6>
                                <div class="editor float-right">
                                    <i class="la la-pencil"></i>
                                    <i class="la la-trash"></i>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas magni, quam mollitia voluptatum in, animi suscipit tempora ea consequuntur non nulla vitae doloremque. Eius rerum, cum earum quae eveniet odio.</p>
                        </div>
                    </div>
                    <!-- fin sous commentaire -->

                    <!-- nouveau sous commentaire -->
                    <div class="media-object">
                        <div class="input-group">
                            <span class="input-group-label"><i class="la la-lg la-comments"></i></span>
                            <input class="input-group-field" type="text">
                            <div class="input-group-button">
                                <button type="submit" class="button hollow"><i class="la la-lg la-mail-reply"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- fin nouveau sous commentaire -->
                </div>

            </div>
        </div>

        <hr>

        
    </div>

</div>		