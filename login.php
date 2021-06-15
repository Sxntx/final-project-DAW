<?php include('views/common/header.php'); session_unset();?>
<div class="loginpanel text-center">

        <h2>Inicia la sessió</h2>

        <div class="subcontent loginsub">
            <form action="controllers/whichUser.php" method="post" id="login">
                <div class="loginform">
                    <div class="form-label">
                        <label for="username">
                                Nom d'usuari
                        </label>
                    </div>
                    <div class="form-input">
                        <input type="text" name="username" id="username" size="15" value="" autocomplete="username">
                    </div>
                    <div class="clearer"><!-- --></div>
                    <div class="form-label">
                        <label for="password">Contrasenya</label>
                    </div>
                    <div class="form-input">
                        <input type="password" name="password" id="password" size="15" value="" autocomplete="current-password">
                    </div>
                </div>

                <div class="clearer"><!-- --></div>
                    <div class="rememberpass">
                        <input type="checkbox" name="rememberusername" id="rememberusername" value="1">
                        <label for="rememberusername">Recorda el nom d'usuari</label>
                    </div>
                <div class="clearer"><!-- --></div>
                <input id="anchor" type="hidden" name="anchor" value="">
                <script>document.getElementById('anchor').value = location.hash;</script>
                <input type="hidden" name="logintoken" value="fSCF4BeInytUnbeoN2mYNSFZCPBidFGr">
                <input type="submit" id="loginbtn" value="Inicia la sessió">
                <div class="forgetpass">
                    <a href="https://aulavirtual.caib.es/c07008363/login/forgot_password.php">Heu oblidat el nom d'usuari o la contrasenya?</a>
                </div>
            </form>

            <div class="desc">
                Les galetes han d'estar habilitades en el vostre navegador
                <span class="helptooltip">
    <a href="https://aulavirtual.caib.es/c07008363/help.php?component=moodle&amp;identifier=cookiesenabled&amp;lang=ca" title="Ajuda: «Les galetes han d'estar habilitades en el vostre navegador»" aria-haspopup="true" target="_blank"><img class="icon iconhelp" alt="Ajuda: «Les galetes han d'estar habilitades en el vostre navegador»" title="Ajuda: «Les galetes han d'estar habilitades en el vostre navegador»" src="https://aulavirtual.caib.es/c07008363/theme/image.php/xtec2/core/1613550610/help"></a>
              </span>
            </div>

        </div>


    </div>
<?php include('views/common/footer.php');?>
