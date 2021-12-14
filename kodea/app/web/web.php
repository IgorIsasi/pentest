<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="webItxura.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Liburuen katalogoa </title>
    </head>

    <body>
    <script>
        //Scroll posizioa gogoratzeko
        window.onload=function(){
        var pos=window.name || 0;
        window.scrollTo(0,pos);
        }
        window.onunload=function(){
        window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
        }
    </script>
    
    <?php 
    if(isset($_SESSION['email']) && isset($_SESSION['admin']) && isset($_SESSION['izena'])){
        $email=$_SESSION['email'];
        $admin=$_SESSION['admin'];
        $izena=$_SESSION['izena'];
    }
    
    ?>

<?php if (isset($_SESSION['email'])){ 
        if($_SESSION['admin']==1){?> 
        <ul class="navbar-admin">
        <li><a class="active" href="erreserbakKudeatu.php">Nire liburuak  <i class="fas fa-book"></i></a> </li>
        <li><a style="float:left" class="active-verde" type="button" value = "Liburua sartu" onclick = "location.href = 'liburuaSartu.html'">Liburu berria</a></li> 
        <li><a>Liburu katalogoa</a></li>
        <li style="float:right"><a href="../datuakAldatu/datuakAldatu.php" class="active"><?php echo $izena."  "?><i style='font-size:18px' class='fas'>&#xf406;</i></a></li>
        <li><a href="sesioaItxi.php" class="active-oscuro"><i style="font-size:24px" class="fa">&#xf08b;</i></a></li>   
        </ul>    
    <?php }else {?>
        <ul class="navbar-erabiltzaile">
        <li><a class="active" href="erreserbakKudeatu.php">Nire liburuak  <i class="fas fa-book"></i></a> </li>
        <li><a>Liburu katalogoa</a></li>
        <li style="float:right"><a href="../datuakAldatu/datuakAldatu.php" class="active"><?php echo $izena."  "?><i style='font-size:18px' class='fas'>&#xf406;</i></a></li>
        <li><a href="sesioaItxi.php" class="active-oscuro"><i style="font-size:24px" class="fa">&#xf08b;</i></a></li>
        </ul>
    <?php }}else{ ?>
        <ul class="navbar-ikusle">
        <li><a>Liburu katalogoa</a></li>
        <li style="float:right"><a class="active-verde" href="../saioaHasi/login.html" ">Saioa hasi</a></li>
        <li style="float:right"><a class="active" href="../erregistratu/erregistroa.html" ">Erregistratu</a></li>
        </ul>
        </ul>
    <?php } ?>
   
    
    <div class = "liburutegia">
    
    <?php
        include '../config.php';
        $_SESSION['url']=$_SERVER['PHP_SELF'];
        $query = mysqli_query($conn, "SELECT * FROM liburua");        
        while ($row = mysqli_fetch_array($query)) {
            $izena=$row['izena'];
            $orriKop=$row['orriKop'];
            $egilea=$row['egilea'];
            $kopurua=$row['kopurua'];
            $prezioa=$row['prezioa'];
            $irudia=$row['irudia'];
            
            
            ?>
            
            <div class="liburuTxartela">
                <div class="liburuIrudia">
                    <img src="<?php echo $irudia?>"> 
                </div>
                <div class="liburuDatuak">
                    <div class="izenaEgilea">
                        <p class="liburuIzena"><b><?php echo $izena; ?></b><p>
                        <p><?php echo ($egilea); ?></p>
                    </div>
                    <div class="prezioaStock">
                            <div class="stock">
                            Stock: <?php echo($kopurua);?> 
                        </div>
                        <div class="prezioa">
                            <p><?php echo ($prezioa); ?>€<p>
                        </div>
                    </div>
                    <?php if (isset($email)){ ?>  
                        <?php
                        $query2=mysqli_query($conn, "SELECT * FROM erreserba WHERE liburuIzena='$izena' && liburuEgilea='$egilea' && erabEmail='$email'") or die (mysqli_error($conn));
                        $erreserbatuDu=mysqli_num_rows($query2);
                        ?>
                        <div class="botoiak-admin">
                            <?php if ($erreserbatuDu == 0 && $kopurua >= 1){ ?>
                                <form method="post" action="liburuaErreserbatu.php">
                                    <input class="botoia" type="submit" value="Erreserbatu">
                                    <input type='hidden' name='izena' value='<?php echo $izena; ?>'>
                                    <input type='hidden' name='egilea' value='<?php echo $egilea; ?>'>
                                    <input type='hidden' name='kopurua' value='<?php echo $egilea; ?>'>
                                </form>
                            <?php }
                            if ($erreserbatuDu != 0){ ?>
                                <form method="post" action="erreserbaEzabatu.php">
                                    <input class="botoia-horia" type="submit" value="Bueltatu">
                                    <input type='hidden' name='izena' value='<?php echo $izena; ?>'>
                                    <input type='hidden' name='egilea' value='<?php echo $egilea; ?>'>
                                    <input type='hidden' name='kopurua' value='<?php echo $egilea; ?>'>
                                </form>
                            <?php } ?>
                            <?php if ($admin == 1){ ?>
                                <form method="post" action="stockEguneratu.php">
                                    <input class="botoia-zuria" type="number" name='stock' min="0" placeholder="Sartu stock berria">
                                    <input class="botoia-berdea" type="submit" value="✓" >
                                    <input type='hidden' name='izena' value='<?php echo $izena; ?>'>
                                    <input type='hidden' name='egilea' value='<?php echo $egilea; ?>'>
                                </form>
                                <form method="post" action="liburuaEzabatu.php">
                                    <button class="botoia-gorria" type="submit"><i class="fa fa-trash"></i></button>
                                    <input type='hidden' name='izena' value='<?php echo $izena; ?>'>
                                    <input type='hidden' name='egilea' value='<?php echo $egilea; ?>'>
                                </form>
                            <?php } ?>                        
                        </div>  
                    <?php } ?>                          
                </div>
            </div> 
        <?php
        }
        ?>
    </div>
    
    </body>     
</html>